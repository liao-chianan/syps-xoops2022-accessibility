<div class="row">
  <{foreach item=user from=$block.users}>
    <div class="col-md-12">
      <div class="thumbnail">
        <{if $user.avatar != ""}>
          <img src="<{$user.avatar}>" alt="<{$user.name}>" class="img-fluid rounded">
        <{else}>
          <img src="<{$xoops_imageurl}>images/blank.gif" alt="<{$user.name}>" class="rounded-circle">
        <{/if}>
        <div class="caption">
          <h3><a href="<{$xoops_url}>/userinfo.php?uid=<{$user.id}>" title="<{$user.name}>"><{$user.name}></a>
          <small><i class="fa fa-calendar" aria-hidden="true"></i> <{$user.joindate}></small></h3>
        </div>
      </div>
    </div>
  <{/foreach}>
</div>