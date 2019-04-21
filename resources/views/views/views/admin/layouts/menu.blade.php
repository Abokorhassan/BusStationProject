<li class="{{ Request::is('admin/posts*') ? 'active' : '' }}">
    <a href="{!! route('admin.posts.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="$ICON_NAME$" data-size="18"
               data-loop="true"></i>
               Posts
    </a>
</li>

<li class="{{ Request::is('admin/yos*') ? 'active' : '' }}">
    <a href="{!! route('admin.yos.index') !!}">
    <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="$ICON_NAME$" data-size="18"
               data-loop="true"></i>
               Yos
    </a>
</li>

