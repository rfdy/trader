<?php

namespace rfd\trader\mcp;

class mcp_trader_info
{
    function module()
    {
        return array(
            'filename'	=> '\rfd\trader\mcp\mcp_trader_module',
            'title'		=> 'Trader',
            'version'	=> '0.0.1',
            'modes'		=> array(
                'open_trader_reports' => array(
                                    'title' => 'REPORT_OPEN_TITLE',
                                    'auth'  => 'acl_m_trader_edit && acl_a_trader',
                                    'cat'   => array('MCP_REPORTS')
                                ),
                'closed_trader_reports'	=> array(
                                    'title' => 'REPORT_CLOSED_TITLE',
                                    'auth'  => 'acl_m_trader_edit && acl_a_trader',
                                    'cat'   => array('MCP_REPORTS')
                            ),
                'trader_report_details' => array(
                                    'title' =>  'REPORT_DETAILS_TITLE',
                                    'auth'  =>  'acl_m_trader_edit && acl_a_trader',
                                    'cat'   =>  array('MCP_REPORTS')
                            ),
            ),
        );
    }
}