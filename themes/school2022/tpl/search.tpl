<form role="search" action="<{xoAppUrl search.php}>" method="get">
    <div class="input-group input-group-sm">
        <input class="form-control" type="text" name="query" title="search" placeholder="<{$smarty.const.THEME_SEARCH_TEXT}>">
        <input type="hidden" name="action" value="results">
        <button class="btn btn-secondary" type="submit"><i class="fa fa-search" aria-hidden="true"></i><span class="sr-only visually-hidden">search</span></button>
    </div>
</form>
