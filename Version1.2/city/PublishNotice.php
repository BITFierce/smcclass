<!DOCTYPE html>
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
?>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="keywords" content="opensource rich wysiwyg text editor jquery bootstrap execCommand html5" />
    <meta name="description" content="This tiny jQuery Bootstrap WYSIWYG plugin turns any DIV into a HTML5 rich text editor" />
    <link rel="apple-touch-icon" href="//mindmup.s3.amazonaws.com/lib/img/apple-touch-icon.png" />
    <link rel="shortcut icon" href="http://mindmup.s3.amazonaws.com/lib/img/favicon.ico" >
    <link href="../css/prettify.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.no-icons.min.css" rel="stylesheet">
    <link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-responsive.min.css" rel="stylesheet">
  <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet">
    <script src="../js/jquery-2.0.0.min.js"></script>
    <script src="../js/TextArea/jquery.hotkeys.js"></script>
    <script src="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <script src="../js/TextArea/prettify.js"></script> 
    <link href="../css/PublishNotice.css" rel="stylesheet">
    <script src="../js/TextArea/bootstrap-wysiwyg.js"></script>
  </head>
  <script>
    function isEmpty()
    {
      if ($("#editor").html() == "" || $("#title").val() == "")
      {
        alert("标题或者内容不能为空！");
        return false;
      }
      $("#heditor").val($("#editor").html());
      return true;
    }
    function canCancel()
    {
      if ($("#editor").html() != "" || $("#title").val() != "")
      {
        if (confirm("已经有标题或内容，是否放弃修改？"))
        {
          location = 'notice.php';
        }
      }
      else
      {
        location = 'notice.php';
      }
      return false;
    }
  </script>
  <?php
    if (isset($_POST["title"]))
    {
        try
        {
            include '../sql/sqlname.php';
            $connect=mysql_connect($sql_host,$sql_user,$sql_pass);
            if (!$connect)
              die('Could not connect: ' . mysql_error());
            mysql_select_db($sql_name, $connect);
            
            mysql_query("set names 'utf8'",$connect);
            $sql = "";
            if ($_POST["typ"] == "pro")
              $sql = "insert into `notice` (`Author`, `Type`, `Title`, `Text`) values ('".$_SESSION["userName"]."（市用户）', 1, '".$_POST["title"]."', '".$_POST["heditor"]."');";
            else if ($_POST["typ"] == "ent")
              $sql = "insert into `notice` (`Author`, `Type`, `Title`, `Text`) values ('".$_SESSION["userName"]."（市用户）', 2, '".$_POST["title"]."', '".$_POST["heditor"]."');";
            else if ($_POST["typ"] == "cit")
              $sql = "insert into `notice` (`Author`, `Type`, `Title`, `Text`) values ('".$_SESSION["userName"]."（市用户）', 3, '".$_POST["title"]."', '".$_POST["heditor"]."');";

            mysql_query($sql, $connect);
            echo "<script>alert(\"添加成功！\");</script>";
            echo "<script>location=\"notice.php\"</script>";
        }
        catch (Exception $e)
        {
            echo "<script>alert(\"出错了！错误信息：".$e."\");</script>";
        }
    }
?>
  <body>

<form action="PublishNotice.php" method="post">
<div class="container">
  
  <div class="head">
    <div></div>
    <span>发布通知</span>
  </div>
  
  <div class="title">
    <span>标题</span>
    <input type="text" id="title" name="title" value="" />
  </div>

  <div class="hero-unit">
    <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
      <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
          </ul>
        </div>
      <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" ><i class="icon-text-height"></i>&nbsp;<b class="caret"></b></a>
          <ul class="dropdown-menu">
          <li><a data-edit="fontSize 5"><font size="5">Huge</font></a></li>
          <li><a data-edit="fontSize 3"><font size="3">Normal</font></a></li>
          <li><a data-edit="fontSize 1"><font size="1">Small</font></a></li>
          </ul>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="bold" ><i class="icon-bold"></i></a>
        <a class="btn" data-edit="italic" ><i class="icon-italic"></i></a>
        <a class="btn" data-edit="strikethrough" ><i class="icon-strikethrough"></i></a>
        <a class="btn" data-edit="underline" ><i class="icon-underline"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="insertunorderedlist" ><i class="icon-list-ul"></i></a>
        <a class="btn" data-edit="insertorderedlist" ><i class="icon-list-ol"></i></a>
        <a class="btn" data-edit="outdent" ><i class="icon-indent-left"></i></a>
        <a class="btn" data-edit="indent" ><i class="icon-indent-right"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="justifyleft" ><i class="icon-align-left"></i></a>
        <a class="btn" data-edit="justifycenter" ><i class="icon-align-center"></i></a>
        <a class="btn" data-edit="justifyright" ><i class="icon-align-right"></i></a>
        <a class="btn" data-edit="justifyfull" ><i class="icon-align-justify"></i></a>
      </div>
      <div class="btn-group">
      <a class="btn dropdown-toggle" data-toggle="dropdown" ><i class="icon-link"></i></a>
        <div class="dropdown-menu input-append">
          <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
          <button class="btn" type="button">Add</button>
        </div>
        <a class="btn" data-edit="unlink" ><i class="icon-cut"></i></a>

      </div>
      
      <div class="btn-group">
        <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
        <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="undo" ><i class="icon-undo"></i></a>
        <a class="btn" data-edit="redo" ><i class="icon-repeat"></i></a>
      </div>
      <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
    </div>
    <input id="heditor" name="heditor" type="hidden" value="" />
    <div id="editor"></div>选择查看对象：
    <input type="radio" name="typ" value="pro" />省级
    <input type="radio" name="typ" value="ent" />企业级
    <input type="radio" name="typ" value="cit" checked="checked" />市级
  
  </div>
  
  <div class="i-footer">
    <input type="submit" id="publish" name="publish" value="提交" onclick="return isEmpty();"/>
    <input type="submit" id="exit" name="exit" value="取消" onclick="return canCancel();"/>
  </div>

</div>
</form>
<script>
  $(function(){
    function initToolbarBootstrapBindings() {
      var fonts = ['宋体', '黑体', '微软雅黑', '楷体', '隶书', '华文行楷', 'Serif', 'Arial', 'Courier', 
            'Comic Sans MS', 'Impact', 'Tahoma', 'Times', 'Verdana'],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
      $.each(fonts, function (idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
      });
      
      $('[data-role=magic-overlay]').each(function () { 
        var overlay = $(this), target = $(overlay.data('target')); 
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });
      if ("onwebkitspeechchange"  in document.createElement("input")) {
        var editorOffset = $('#editor').offset();
        $('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
      } else {
        $('#voiceBtn').hide();
      }
  };
  function showErrorAlert (reason, detail) {
    var msg='';
    if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
    else {
      console.log("error uploading file", reason, detail);
    }
    $('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
     '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
  };
    initToolbarBootstrapBindings();  
  $('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
    window.prettyPrint && prettyPrint();
  });
</script>
<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-37452180-6', 'github.io');
  ga('send', 'pageview');
</script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "http://connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
 </script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="http://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</body>
</html>
