<div class="btn-group btn-group-vertical">
    @foreach($actions as $action => $params)
        @includeIf("toolbars.actions.{$action}", $params)
    @endforeach
</div>
