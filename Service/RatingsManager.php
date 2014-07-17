<?php


namespace rfd\trader\Service;

use Symfony\Component\Config\Definition\Exception\Exception,
    phpbb\auth\auth                 as phpbbAuth;

class RatingsManager {
    const TOPIC_TYPE_BUY = 1;
    const TOPIC_TYPE_SELL = 2;
    const TOPIC_TYPE_TRADE = 3;

    // The following are used as options for method control and are NOT real topic types
    const TAB_TYPE_ALL = 0;
    const TAB_TYPE_LEFT = 4;

    const RATE_POSITIVE = 1;
    const RATE_NEUTRAL = 0;
    const RATE_NEGATIVE = -1;
    /**
     * Database driver
     * @var \phpbb\db\driver\driver
     */
    protected $db;

    /**
     * @var \phpbb\request\request
     */
    protected $request;

    /**
     * Auth object
     * @var \phpbb\auth\auth
     */
    protected $auth;

    /**
     * Name of the feedback database tables
     * @var string
     */
    private $tables;

    public function __construct(\phpbb\db\driver\driver $db,\phpbb\request\request $request, phpbbAuth $auth, array $tables) {
        $this->db           = $db;
        $this->request      = $request;
        $this->auth         = $auth;
        $this->tables       = $tables;
    }

    /**
     * Gives topic a trader type of buy, sell, or trade
     * @param $topic_id
     * @param $type         if topic is buy, sell or trade, signified by int.
     */
    public function setTopicType($topic_id, $type) {
        $topic_id = (int) $topic_id;

        if ($type != self::TOPIC_TYPE_BUY && $type != self::TOPIC_TYPE_SELL && $type != self::TOPIC_TYPE_TRADE) {
            return false;
        }

        $sql_ary = array(
            'topic_trader_type'          =>  $type,
        );

        $this->db->sql_query(
            'UPDATE ' . TOPICS_TABLE . ' SET ' . $this->db->sql_build_array('UPDATE', $sql_ary) . 'WHERE topic_id=' . $topic_id
        );
    }

    /**
     * Gives user trader feedback for the topic. Can only give feedback to user once per topic.
     *
     * @param $to_user_id       User to give feedback to
     * @param $from_user_id     User that is giving feedback
     * @param $feedback_score
     * @param $topic_id
     * @param $topic_title
     * @param $topic_type
     * @param $short_comment
     * @param $long_comment
     * @return bool|mixed
     */
    public function giveFeedback($to_user_id, $from_user_id, $feedback_score, $topic_id, $topic_title, $topic_type, $short_comment, $long_comment) {
        $sql_ary = array (
            'to_user_id'           =>  (int) $to_user_id,
            'from_user_id'         =>  (int) $from_user_id,
            'feedback_score'       =>  (int) $feedback_score,
            'topic_id'             =>  (int) $topic_id,
            'topic_title'          =>  $topic_title,
            'topic_type'           =>  (int) $topic_type,
            'date_created'         =>  $this->request->server('REQUEST_TIME'),
            'is_deleted'           =>  false,
        );

        $result = $this->db->sql_query('INSERT INTO ' . $this->tables['feedback'] . ' ' . $this->db->sql_build_array('INSERT', $sql_ary));

        if (!$result) {
            return false;
        }

        $this->addComment($this->db->sql_nextid(), $short_comment, $long_comment);

        if ($this->canRateUser($to_user_id, $from_user_id)) {
            $this->giveUserRating($to_user_id, $feedback_score);
        }
    }

    public function deleteFeedback($feedback_row) {
        $feedback_id = (int) $feedback_row['feedback_id'];

        if ($this->isFirstFeedback($feedback_row['to_user_id'], $feedback_row['from_user_id'], $feedback_row['feedback_id'])) {
            $this->removeUserRating($feedback_row['to_user_id'],$feedback_row['feedback_score']);
        }
        if ($this->auth->acl_get('m_feedback_edit') || $this->auth->acl_get('a_trader')) {
            $this->db->sql_query('UPDATE ' . $this->tables['feedback'] . " SET is_deleted=1 WHERE feedback_id=$feedback_id");
        }
        else {
            $this->db->sql_query('DELETE FROM ' . $this->tables['feedback'] . " WHERE feedback_id=$feedback_id");
            $this->db->sql_query('DELETE FROM ' . $this->tables['comments'] . " WHERE feedback_id=$feedback_id");
        }
    }
    public function revertDelete($feedback_row) {
        if ($this->isFirstFeedback($feedback_row['to_user_id'], $feedback_row['from_user_id'], $feedback_row['feedback_id'])) {
            $this->giveUserRating($feedback_row['to_user_id'], $feedback_row['feedback_score']);
        }

        $this->db->sql_query('UPDATE ' . $this->tables['feedback'] . ' SET is_deleted=0 WHERE feedback_id=' . $feedback_row['feedback_id']);
    }

    /**
     * Grabs info of feedback, including score, title and comments.
     *
     * @param $feedback_id
     * @return mixed
     */
    public function getAllFeedbackInfo($feedback_id) {
        $feedback_id = (int) $feedback_id;
        $result = $this->db->sql_query('SELECT f.feedback_id as feedback_id,
                                               f.feedback_score as rating,
                                               f.topic_title as topic_title,
                                               f.topic_type as topic_type,
                                               f.feedback_score as feedback_score,
                                               f.to_user_id as to_user_id,
                                               f.from_user_id as from_user_id,
                                               f.date_created as date_created,
                                               f.is_deleted as is_deleted,
                                               c.short_comment as short_comment,
                                               c.long_comment as long_comment
                                           FROM ' . $this->tables['feedback'] . ' f
                                           INNER JOIN ' . $this->tables['comments'] . ' c
                                           ON f.feedback_id=c.feedback_id
                                           WHERE f.feedback_id=' . $feedback_id . '
                                           ORDER by c.comment_id DESC LIMIT 1');

        return $this->db->sql_fetchrow($result);
    }

    /**
     * @param $feedback_id - the id of the feedback you want to retrieve feedback for
     * @param int $limit - the upper limit of feedback comments you'd like to retrieve - 0 will retrieve all
     * @return array of feedback comment rows
     */
    public function getFeedbackComments($feedback_id, $limit=0) {
        $feedback_id = (int) $feedback_id;

        $sql = 'SELECT * FROM '. $this->tables['comments'] . ' WHERE feedback_id=' . $feedback_id . ' ORDER by date_created DESC ';
        if ($limit) {
            $sql .= 'LIMIT ' . $limit;
        }
        $result = $this->db->sql_query($sql);

        $rows = array();
        while ($row = $this->db->sql_fetchrow($result)) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function getLatestFeedbackComment($feedback_id) {
        $comments = $this->getFeedbackComments($feedback_id, 1);
        return $comments[0];
    }

    /**
     * Adds comment to comments table for the corresponding feedback.
     *
     * @param $feedback_id      Feedback that comment is linked to
     * @param $short_comment
     * @param $long_comment
     * @param int $editor_id    Editor of the comment if it has been edited, 0 if original unedited post
     * @return mixed
     */
    private function addComment($feedback_id, $short_comment, $long_comment, $editor_id=0){
        $sql_ary = array(
            'feedback_id'       =>  (int) $feedback_id,
            'short_comment'     =>  $short_comment,
            'long_comment'      =>  $long_comment,
            'date_created'      =>  $this->request->server('REQUEST_TIME'),
            'editor_user_id'    =>  (int) $editor_id,
        );

        return $this->db->sql_query('INSERT INTO ' . $this->tables['comments'] . ' ' . $this->db->sql_build_array('INSERT', $sql_ary));
    }

    /**
     * Gives user a rating after feedback, can only receive a rating the first time a person gives you feedback.
     *
     * @param $to_id        Recipient of feedback
     * @param $from_id      Sender of feedback
     * @param $rating       Rating: positive, neutral, or negative
     * @return bool         If user successfully recieved rating (+1, 0 , -1) and set onto their profile.
     */
    public function giveUserRating($user_id, $rating) {
        $user_id = (int) $user_id;
        $rating = (int) $rating;

        $sql = 'UPDATE ' . USERS_TABLE;

        if ($rating == self::RATE_POSITIVE) {
            $sql .= ' SET user_trader_positive=user_trader_positive+1';
        }
        elseif ($rating == self::RATE_NEUTRAL) {
            $sql .= ' SET user_trader_neutral=user_trader_neutral+1';
        }
        elseif ($rating == self::RATE_NEGATIVE) {
            $sql .= ' SET user_trader_negative=user_trader_negative+1';
        }

        $sql .= ' WHERE user_id=' . $user_id;

        $this->db->sql_query($sql);
    }

    public function editFeedback($feedback_row, $rating, $new_short, $new_long, $delete, $editor_id) {
        if ($feedback_row['feedback_score'] != $rating && !$delete &&
                $this->isFirstFeedback($feedback_row['to_user_id'], $feedback_row['from_user_id'], $feedback_row['feedback_id']))
        {
            $this->removeUserRating($feedback_row['to_user_id'], $feedback_row['feedback_score']);
            $this->giveUserRating($feedback_row['to_user_id'], $rating);
        }

        $sql_ary = array(
            'feedback_score'     =>  (int) $rating,
        );
        $this->db->sql_query('UPDATE ' . $this->tables['feedback'] . ' SET ' . $this->db->sql_build_array('UPDATE', $sql_ary) .
                                                                            ' WHERE feedback_id=' . $feedback_row['feedback_id']);
        if ($new_short != $feedback_row['short_comment'] || $new_long != $feedback_row['long_comment']) {
            $this->addComment($feedback_row['feedback_id'],$new_short,$new_long, $editor_id);
        }
    }

    /**
     * Returns if the post should have trader button. Checks to see if post is the first post of topic, and
     * if the forum has the trader setting enabled. If so, Give feedback button is shown on post.
     *
     * @param $post_id
     * @param $topic_id
     * @return bool
     */
    public function showTrader($post_id, $topic_id) {
        $post_id = (int) $post_id;
        $topic_id = (int) $topic_id;

        $result = $this->db->sql_query('SELECT forum_id, topic_first_post_id FROM ' . TOPICS_TABLE . ' WHERE topic_id=' . (int) $topic_id);
        $post_row = $this->db->sql_fetchrow($result);

        if ($post_id != $post_row['topic_first_post_id']) {
            return false;
        }

        $result = $this->db->sql_query('SELECT enable_trader FROM ' . FORUMS_TABLE . ' WHERE forum_id=' . $post_row['forum_id']);
        $forum_row = $this->db->sql_fetchrow($result);

        if ($forum_row['enable_trader']) {
            return true;
        }
        else return false;
    }

    /**
     * Returns whether the user can give a feedback to the topic creator.
     *
     * @param $to_id
     * @param $from_id
     * @param $topic_id
     * @return bool
     */
    public function canGiveFeedback($to_id, $from_id, $topic_id) {

        $to_id = (int) $to_id;
        $from_id = (int) $from_id;
        $topic_id = (int) $topic_id;

        $result = $this->db->sql_query('SELECT feedback_id FROM ' . $this->tables['feedback'] . " WHERE to_user_id=$to_id AND
                                                                                                     from_user_id=$from_id AND
                                                                                                     topic_id=$topic_id AND is_deleted=0
                                                                                                     LIMIT 1");
        return !$this->db->sql_fetchrow($result);
    }

    /**
     * Array is returned with
     * (
     *      'user_trader_positive'
     *      'user_trader_neutral'
     *      'user_trader_negative'
     *      'user_trader_percentage'
     *      'user_trader_rating'
     *      'user_trader_total_positive' if flag $include_positive_total is set
     *      'user_trader_total_feedback_received' if flag $include_positive_total is set
     *
     * @param $user_id
     * @param $include_positive_total - an extra query will be made to get this user's total positive feedback
     * @return bool|array - false if user_id not in phpbb users table, array with data otherwise
     */
    public function getUserFeedbackStats($user_id, $include_positive_total=false) {
        $result = $this->db->sql_query('SELECT user_trader_positive, user_trader_neutral, user_trader_negative FROM ' . USERS_TABLE . ' WHERE user_id=' . $user_id);
        $trader_stats = $this->db->sql_fetchrow($result);

        if (!$trader_stats) {
            return false;
        }

        $positive = $trader_stats['user_trader_positive'];
        $neutral = $trader_stats['user_trader_neutral'];
        $negative = $trader_stats['user_trader_negative'];
        $trader_stats['user_trader_percentage'] = $this->getPositivePercent($positive, $negative);
        $trader_stats['user_trader_rating'] = $positive - $negative;

        if ($include_positive_total) {
            $result = $this->db->sql_query('SELECT count(*) as cnt FROM ' . $this->tables['feedback'] . ' WHERE feedback_score=' . self::RATE_POSITIVE . ' AND is_deleted=0 AND to_user_id=' . $user_id);
            $row = $this->db->sql_fetchrow($result);
            $trader_stats['user_trader_total_positive'] = $row['cnt'];
        }

        return $trader_stats;
    }

    public function getPositivePercent($positive, $negative, $digits=1) {
        $total = $positive + $negative;
        if ($total) {
            return round(100 * ($positive / $total), $digits);
        }
        else {
            return 0;
        }
    }

    /**
     * @param $user_id
     * @param array $months
     * @return array
     */
    public function getRecentUserFeedbackCounts($user_id, array $months = array(1, 6, 12)) {
        $months = array_values($months);
        $num_elements = count($months);

        $recent_feedback_counts = array(
                                        self::RATE_POSITIVE  => array_fill(0, $num_elements, 0),
                                        self::RATE_NEUTRAL   => array_fill(0, $num_elements, 0),
                                        self::RATE_NEGATIVE  => array_fill(0, $num_elements, 0),
                                  );

        foreach ($months as $time_index => $num_months) {
            $date = new \DateTime("-{$num_months} months");

            $sql = "SELECT
                        COUNT(*) AS cnt,
                        feedback_score
                    FROM
                        " . $this->tables['feedback'] . "
                    WHERE
                            to_user_id={$user_id}
                        AND
                            date_created > {$date->getTimestamp()}
                        AND
                            is_deleted = 0
                    GROUP BY
                        feedback_score";
            $result = $this->db->sql_query($sql);
            while ($row = $this->db->sql_fetchrow($result)) {
                $recent_feedback_counts[$row['feedback_score']][$time_index] = $row['cnt'];
            }
        }
        return $recent_feedback_counts;
    }

    private function canRateUser($to_id, $from_id) {
        $to_id = (int) $to_id;
        $from_id = (int) $from_id;

        $result = $this->db->sql_query('SELECT feedback_id FROM ' . $this->tables['feedback'] . " WHERE to_user_id=$to_id AND
                                                                                                     from_user_id=$from_id");
        $this->db->sql_fetchrow($result);
        return !$this->db->sql_fetchrow($result);

    }

    /**
     * Checks if the feedback given is the first feedback exchanged between the users
     *
     * @param $feedback_id
     */
    private function isFirstFeedback($to_user_id, $from_user_id, $feedback_id) {
        $result =  $this->db->sql_query('SELECT feedback_id FROM ' . $this->tables['feedback'] . " WHERE to_user_id=$to_user_id AND from_user_id=$from_user_id
                                         ORDER BY feedback_id ASC LIMIT 1");
        if (!($feedback_row = $this->db->sql_fetchrow($result))) {
            return false;
        }

        $first_feedback_id = $feedback_row['feedback_id'];

        if ($first_feedback_id == $feedback_id) {
            return true;
        } else return false;
    }

    private function removeUserRating($user_id, $rating) {
        $user_id = (int) $user_id;
        $rating = (int) $rating;
        $rating_field = '';
        if ($rating == self::RATE_POSITIVE) {
            $rating_field = 'user_trader_positive';
        } elseif ($rating == self::RATE_NEUTRAL) {
            $rating_field = 'user_trader_neutral';
        } elseif ($rating == self::RATE_NEGATIVE) {
            $rating_field = 'user_trader_negative';
        }

        $this->db->sql_return_on_error(true);
        $this->db->sql_query('UPDATE ' . USERS_TABLE . " SET $rating_field=$rating_field-1 WHERE user_id=$user_id");
    }

    /**
     * @param int $start - the start of feedbacks you want to find
     * @param int $limit - the total number of feedbacks you want to limit by. If 0 return all
     * @param int $user_id - the id of the user you want to find feedbacks for (or false if all users)
     * @param int $filter - TOPIC_TYPE_SELL, TOPIC_TYPE_BUY, TOPIC_TYPE_TRADE, TAB_TYPE_ALL, TAB_TYPE_LEFT
     *                      specifies the topic type of feedbacks you want (LEFT meaning those feedbacks which
     *                                                                  user_id left for others)
     *
     * @return array of all users feedbacks if user_id is false, otherwise returns all feedbacks
     * that were given to user with id user_id.
     */
    public function get_users_feedback($start = 0, $limit = 20, $user_id = false, $filter = self::TAB_TYPE_ALL, $include_deleted = false, &$count = 0) {
        $where_sql = ' WHERE 1 ';

        if ($user_id) {
            if ($filter == self::TAB_TYPE_LEFT) {
                $where_sql .= " AND from_user_id={$user_id} ";
            } else {
                $where_sql .= " AND to_user_id={$user_id} ";
            }
        }

        if (!$include_deleted) {
            $where_sql .= ' AND is_deleted=0';
        }

        if (($filter != self::TAB_TYPE_ALL) && ($filter != self::TAB_TYPE_LEFT)) {
            $where_sql .= " AND topic_type=" . $filter;
        }

        // Query for the count
        $sql = 'SELECT count(*) as cnt FROM ' . $this->tables['feedback'];
        $sql .= $where_sql;
        $result = $this->db->sql_query($sql);
        $count_row = $this->db->sql_fetchrow($result);
        $this->db->sql_freeresult($result);
        $count = $count_row['cnt'];

        if (!$count) { // if there are no feedbacks returned, there's no point querying for the feedbacks
            return array();
        }

        // Now query for the feedbacks that we will display on the page
        $sql = 'SELECT * FROM ' . $this->tables['feedback'];
        $sql .= $where_sql;
        $sql .= " ORDER BY feedback_id DESC ";
        $sql .= ($limit ? " LIMIT {$start}, {$limit} " : '');

        $result = $this->db->sql_query($sql);

        $rows = array();
        while ($row = $this->db->sql_fetchrow($result)) {
            $rows[] = $row;
        }
        $this->db->sql_freeresult($result);

        return $rows;
    }

    /**
     * @deprecated
     * @param int $user_id - the id of the user you want to count feedbacks for (or false if all users)
     * @param int $filter - TOPIC_TYPE_SELL, TOPIC_TYPE_BUY, TOPIC_TYPE_TRADE, TAB_TYPE_ALL, TAB_TYPE_LEFT
     *                      specifies the topic type of the feedbacks you want (LEFT meaning those feedbacks which
     *                                                                  user_id left for others)
     *
     * @return int - count of all users feedbacks if user_id is false, otherwise returns count of all feedbacks
     * that were given to user with id user_id of filtered type
     */
    public function get_users_feedback_count($user_id = false, $filter = self::TAB_TYPE_ALL, $include_deleted = false) {
        $sql = 'SELECT count(*) as cnt FROM ' . $this->tables['feedback'];
        $sql .= ' WHERE 1 ';

        if ($user_id) {
            if ($filter == self::TAB_TYPE_LEFT) {
                $sql .= " AND from_user_id={$user_id} ";
            } else {
                $sql .= " AND to_user_id={$user_id} ";
            }
        }

        if (!$include_deleted) {
            $sql .= ' AND is_deleted=0 ';
        }

        if (($filter != self::TAB_TYPE_ALL) && ($filter != self::TAB_TYPE_LEFT)) {
            $sql .= " AND topic_type= " . $filter;
        }

        $result = $this->db->sql_query($sql);
        $row = $this->db->sql_fetchrow($result);
        $this->db->sql_freeresult($result);
        return $row['cnt'];
    }
}


