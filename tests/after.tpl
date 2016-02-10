<html>
<head>

{{* This is a comment. ここはコメントですこんにちわ *}}

{{assign var="charset" value="UTF8"}}
{{assign var="my_id" value="123"}}
{{assign var="isThatTrue" value="1"}}

<meta http-equiv="Content-Type" content="text/html; charset={{$charset}}" />
<title>This is a Title はろー</title>

{{if $config.smarty_debug}}
  {{debug}}
{{/if}}

{{if $isThatTrue}}
{{literal}}
<style type="text/css">
  body { width:11em; }
</style>
{{/literal}}
{{/if}}

<script type="text/javascript">
var $app = new Object();
$app.id = {{$my_id}};
{{literal}}
$(function(){
  $('#btn').on('click', function(){
      run($app);
  });
});
{{/literal}}
</script>

</head>

{{if $app.bgcolor}}
  <body class="{{$app.bgcolor}}">
{{else}}
  <body class="white">
{{/if}}

{{if count($errors)}}
<p class="errors">

  {{foreach from=$errors item=error}}
  <font color="red">{{$error}}</font><br />
  {{/foreach}}

</p>
{{/if}}
