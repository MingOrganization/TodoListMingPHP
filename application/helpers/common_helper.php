<?php

    /**
    * dump  格式化输出变量程序
    *
    * @param vars    变量
    * @param output    是否将内容输出
    * @param show_trace    是否将使用spError对变量进行追踪输出
    */
    function dump($vars, $label = '', $return = false) {
        if (ini_get('html_errors')) {
            $content = "<pre>\n";
            if ($label != '') {
                $content .= "<strong>{$label} :</strong>\n";
            }
            $content .= htmlspecialchars(print_r($vars, true),ENT_COMPAT | ENT_IGNORE);
            $content .= "\n</pre>\n";
        } else {
            $content = $label . " :\n" . print_r($vars, true);
        }
        if ($return) { return $content; }
        echo $content;
        return null;
    }

    /**
     * json 格式返回结果
     * @param  [type] $code [description]
     * @param  [type] $msg  [description]
     * @return [type]       [description]
     */
    function json_return($code, $data = NULL)
    {
        $return = array('code' => $code, 'msg' => sys_status($code), 'data' => $data);
        echo json_encode($return);
        exit;
    }

    /**
     * 系统状态
     * @param  integer $code [description]
     * @return [type]        [description]
     */
    function sys_status($code = 1001)
    {
        $stat = array(
            // *****************  1-1000 vendor 错误 ***************** //
            '1' => '无法连接三方会员服务器',
            // *****************  系统级 ***************** //
            '1001' => '操作成功',
            '1002' => '接口验证失败',
            '1003' => '没有权限进行访问',
            '1004' => '手机号码格式不正确',
            '1005' => '操作失败',
            //*****************  用户模块 10001~11000****************//
            '10001' => '用户名和密码不能为空',
            '10002' => '登录密码错误',
            '10003' => '用户已存在',
            '10004' => '用户名或密码错误',
        );

        return $stat[$code];
    }



 ?>
