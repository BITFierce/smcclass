<?php
    if (isset($_COOKIE["sesID"]))
    {
        session_id($_COOKIE["sesID"]);
        session_start();
    }
    else {
        session_start();
        setcookie("sesID", session_id(), time() + 3600);
    }
    try
    {
        $root = "root";//数据库用户
        $password = "root";//数据库用户密码
        $database = "hrmdas";//数据库名
        $databaseURL = "localhost:3306";//数据库地址

        $connect = mysql_connect($databaseURL, $root, $password);
        mysql_query("set names 'utf8'",$connect);
        mysql_select_db($database, $connect);
        if (isset($_POST["pass"]) && isset($_GET["cid"]))
        {
            $sql = 'update `dataacquisition` set `CheckLevel` = 1 where `InstitutionNumber` = "'.$_GET['cid'].'";';
            if (mysql_query($sql, $connect))
            {
                echo "<script>alert(\"操作成功！\");</script>";
                echo '<script>location = "report.php";</script>';
            }
            else
            {
                echo "<script>alert(\"操作失败！\");</script>";
                echo '<script>location = "report.php";</script>';
            }
        }
        else if (isset($_POST["unpass"]) && isset($_GET["cid"]))
        {
            $sql = "select * from `dataacquisition`, `company`, `surveyperiod` where `dataacquisition`.`institutionNumber` = `company`.`CompanyNumber` and `dataacquisition`.`SurveyPeriodID` = `surveyperiod`.`SurveyID` and `InstitutionNumber` = '".$_GET['cid']."';";
            $result = mysql_query($sql, $connect);
            $res = mysql_fetch_assoc($result);
            $sql = 'update `dataacquisition` set `CheckLevel` = 3 where `InstitutionNumber` = "'.$_GET['cid'].'";';
            if (mysql_query($sql, $connect))
            {
                echo "<script>alert(\"操作成功！\");</script>";
                if (!mysql_query("insert into `notice` (`Author`, `Type`, `Title`, `Text`) values (\"系统\", \"2\", \"<b>[系统]</b>企业".$_GET['cid']."上报数据退回通知\", \"<blockquote style='text-align: justify; margin: 0px 0px 0px 40px; border: none; padding: 0px;'>企业：<b>".$res['CompanyName']."</b>上报的报表中存在不合理的地方，已经退回，请修改后重新上报，特此通知。</blockquote><blockquote style='text-align: right; margin: 0px 0px 0px 40px; border: none; padding: 0px;'>操作人：".$_SESSION['userName']."（市用户）</blockquote>\")", $connect))
                {
                    echo "<script>alert(\"通知发布失败！\");</script>";
                }
                echo '<script>location = "report.php";</script>';
            }
            else
            {
                echo "<script>alert(\"操作失败！\");</script>";
                echo '<script>location = "report.php";</script>';
            }
        }
        else
        {
            echo "<script>alert(\"无效访问！\");</script>";
            echo '<script>location = "report.php";</script>';
        }
    }
    catch(Exception $e)
    {
        echo "<script>alert(\"出错了！错误信息：".$e."\");</script>";
    }
?>