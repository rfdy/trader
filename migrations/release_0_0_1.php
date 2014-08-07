<?php

namespace rfd\trader\migrations;

class release_0_0_1 extends \phpbb\db\migration\migration {
    public function effectively_installed() {
        $sql = 'SELECT config_value
				FROM ' . $this->table_prefix . "config
				WHERE config_name = 'phpbb_trader_version'";
        $result = $this->db->sql_query($sql);
        $version = $this->db->sql_fetchfield('config_value');
        $this->db->sql_freeresult($result);

        return $version && (version_compare($version, '0.0.1') >= 0);
    }

    static public function depends_on() {
        return array('\phpbb\db\migration\data\v310\dev');
    }

    public function update_schema() {
        $ret = array(
            'add_tables' => array(
                $this->table_prefix . 'trader_feedback'			=> array(
                    'COLUMNS'		        => array(
                        'feedback_id'			    => array('UINT', null, 'auto_increment'),
                        'reply_feedback_id'         => array('UINT', 0),
                        'to_user_id'		        => array('UINT', 0),
                        'from_user_id'		        => array('UINT', 0),
                        'feedback_score'            => array('TINT:3', 0),
                        'topic_id'                  => array('UINT', 0),
                        'topic_title'               => array('VCHAR:255', ''),
                        'topic_type'                => array('VCHAR:10', 0),
                        'date_created'		    	=> array('TIMESTAMP', 0),
                        'is_deleted'                => array('TINT:3', 0),
                    ),
                    'PRIMARY_KEY'	=> 'feedback_id',
                    'KEYS'           => array(
                        'toid'                => array('INDEX', 'to_user_id'),
                        'fromid'              => array('INDEX', 'from_user_id'),
                    )
                ),
                $this->table_prefix . 'trader_comments'		=> array(
                    'COLUMNS'		=> array(
                        'comment_id'			=> array('UINT', null, 'auto_increment'),
                        'feedback_id'		        => array('UINT', 0),
                        'short_comment'		    => array('TEXT', ''),
                        'long_comment'		    => array('TEXT', ''),
                        'date_created'		    => array('TIMESTAMP', 0),
                        'editor_user_id'		        => array('UINT', 0),
                    ),
                    'PRIMARY_KEY'	=> 'comment_id'
                ),
            ),
            'add_columns'	=> array(
                $this->table_prefix . 'users'   => array(
                    'user_trader_positive'	    => array('UINT', 0),
                    'user_trader_neutral'	        => array('UINT', 0),
                    'user_trader_negative'	        => array('UINT', 0),
                ),
                $this->table_prefix . 'forums' => array(
                    'enabled_trader_types' => array('TINT:3', 0),
                ),
                $this->table_prefix . 'topics' => array(
                    'topic_trader_type' => array('VCHAR:10', ''),
                ),
            ),
        );
        return $ret;
    }

    public function revert_schema() {
        return array(
            'drop_tables'	=> array(
                $this->table_prefix . 'trader_feedback',
                $this->table_prefix . 'trader_comments',
                $this->table_prefix . 'trader_replies',
                $this->table_prefix . 'trader_topics',
            ),
            'drop_columns'	=> array(
                $this->table_prefix . 'users'   => array(
                    'user_trader_positive',
                    'user_trader_neutral',
                    'user_trader_negative',
                ),
                $this->table_prefix . 'forums'   => array(
                    'enabled_trader_types',
                ),
                $this->table_prefix . 'topics'   => array(
                    'topic_trader_type',
                ),
            ),
        );
    }

    public function update_data() {
        return array(
            array('config.add', array('phpbb_trader_version', '0.0.1')),

            array('permission.add', array('a_trader', true)),
            array('permission.add', array('m_feedback_edit', true)),

            array('permission.permission_set', array('ROLE_ADMIN_FULL','a_trader')),
            array('permission.permission_set', array('ROLE_ADMIN_STANDARD','a_trader')),
            array('permission.permission_set', array('ROLE_MOD_FULL','m_feedback_edit')),

            array('module.add', array('acp', 'ACP_CAT_USERGROUP', 'Trader')),

            array('module.add', array('acp', 'Trader', array(
                'module_basename'	=> '\rfd\trader\acp\main_module',
                'module_langname'	=> 'Recalculate Trader Rating',
                'module_mode'	=> 'recalculate_trader_rating',
                'module_auth'	=> 'acl_a_trader && acl_a_board',
            ))),

        );
    }

}
