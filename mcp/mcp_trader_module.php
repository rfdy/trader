<?php

namespace rfd\trader\mcp;

use phpbb\datetime;

class mcp_trader_module
{
    public $u_action;
    public $options;

    private $id;

    public function fetch_user_row($db, $user_id) {
        $sql = 'SELECT * FROM ' . USERS_TABLE . ' WHERE user_id=' . $user_id;
        $result = $db->sql_query($sql);
        $user_row = $db->sql_fetchrow($result);
        $db->sql_freeresult($result);
        return $user_row;
    }

    function main($id, $mode)
    {
        $this->id = $id;

        add_form_key('mcp_trader');
        $this->tpl_name = 'mcp_trader_reports';

    }
}

