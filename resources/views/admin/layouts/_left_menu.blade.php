<ul id="menu" class="page-sidebar-menu">

    <li {!! (Request::is('admin') ? 'class="active"' : '') !!}>
        <a href="{{ route('admin.dashboard') }}">
            <i class="livicon" data-name="dashboard" data-size="18" data-c="#418BCA" data-hc="#418BCA"
               data-loop="true"></i>
            <span class="title">Dashboard</span>
        </a>
    </li>

      {{-- Stations --}}
    <li {!! (Request::is('admin/station') || Request::is('admin/station/create') || Request::is('admin/station/*')   ? 'class="active"' : '') !!}>
        <a href="#">
            {{-- <i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i> --}}
            <i style="margin-top: -2%;" class="livicon" data-name="sitemap" data-size="21" data-c="#f4425f" data-hc="#fff" data-loop="true"></i>
            <span  class="title">Station</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/station') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/station') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Station Lists
                </a>
            </li>

            <li {!! (Request::is('admin/station/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/station/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New station
                </a>
            </li>
        </ul>
    </li>

     {{-- Route --}}
     <li {!! (Request::is('admin/route') || Request::is('admin/route/create') || Request::is('admin/route/*')   ? 'class="active"' : '') !!}>
        <a href="#">
            {{-- <i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i> --}}
            {{-- <i style="margin-top: -2%;" class="livicon" data-name="sitemap" data-size="21" data-c="#f4425f" data-hc="#fff" data-loop="true"></i> --}}
            <img style="margin-top: -3%;" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iMjgiIGhlaWdodD0iMjgiCnZpZXdCb3g9IjAgMCAxNzIgMTcyIgpzdHlsZT0iIGZpbGw6IzAwMDAwMDsiPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0ibm9uemVybyIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIHN0cm9rZS1saW5lY2FwPSJidXR0IiBzdHJva2UtbGluZWpvaW49Im1pdGVyIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHN0cm9rZS1kYXNoYXJyYXk9IiIgc3Ryb2tlLWRhc2hvZmZzZXQ9IjAiIGZvbnQtZmFtaWx5PSJub25lIiBmb250LXdlaWdodD0ibm9uZSIgZm9udC1zaXplPSJub25lIiB0ZXh0LWFuY2hvcj0ibm9uZSIgc3R5bGU9Im1peC1ibGVuZC1tb2RlOiBub3JtYWwiPjxwYXRoIGQ9Ik0wLDE3MnYtMTcyaDE3MnYxNzJ6IiBmaWxsPSJub25lIj48L3BhdGg+PGc+PHBhdGggZD0iTTY5LjYwNjI1LDEyMi4xNDY4OHYwYzMuNjI4MTMsLTQuODM3NSA1LjY0Mzc1LC0xMC44ODQzOCA1LjY0Mzc1LC0xNy4zMzQzOGMwLC0xNi4zOTM3NSAtMTMuMTY4NzUsLTI5LjU2MjUgLTI5LjU2MjUsLTI5LjU2MjVjLTE2LjM5Mzc1LDAgLTI5LjU2MjUsMTMuMTY4NzUgLTI5LjU2MjUsMjkuNTYyNWMwLDYuNDUgMi4wMTU2MywxMi40OTY4NyA1LjY0Mzc1LDE3LjMzNDM4djB2MGMwLjEzNDM3LDAuMjY4NzUgMC4yNjg3NSwwLjQwMzEyIDAuNDAzMTIsMC42NzE4N2wyMy41MTU2MywzMS43MTI1bDIzLjUxNTYzLC0zMS44NDY4N2MwLjEzNDM4LC0wLjEzNDM3IDAuMjY4NzUsLTAuMjY4NzUgMC40MDMxMiwtMC41Mzc1eiIgZmlsbD0iI2ZmZmZmZiI+PC9wYXRoPjxwYXRoIGQ9Ik00NS42ODc1LDE1OC41NjI1djBjLTEuMzQzNzUsMCAtMi40MTg3NSwtMC42NzE4OCAtMy4yMjUsLTEuNjEyNWwtMjMuNTE1NjMsLTMxLjg0Njg4Yy0wLjEzNDM3LC0wLjEzNDM3IC0wLjI2ODc1LC0wLjQwMzEyIC0wLjUzNzUsLTAuNjcxODdjLTQuMTY1NjMsLTUuNjQzNzUgLTYuMzE1NjMsLTEyLjQ5Njg3IC02LjMxNTYzLC0xOS42MTg3NWMwLC0xOC41NDM3NSAxNS4wNSwtMzMuNTkzNzUgMzMuNTkzNzUsLTMzLjU5Mzc1YzE4LjU0Mzc1LDAgMzMuNTkzNzUsMTUuMDUgMzMuNTkzNzUsMzMuNTkzNzVjMCw3LjEyMTg4IC0yLjE1LDEzLjg0MDYzIC02LjMxNTYzLDE5LjQ4NDM4bC0wLjEzNDM3LDAuMTM0MzdsLTAuNDAzMTMsMC41Mzc1bC0yMy41MTU2MiwzMS44NDY4OGMtMC44MDYyNSwxLjA3NSAtMS44ODEyNSwxLjc0Njg3IC0zLjIyNSwxLjc0Njg3ek00NS42ODc1LDc5LjI4MTI1Yy0xNC4xMDkzNywwIC0yNS41MzEyNSwxMS40MjE4OCAtMjUuNTMxMjUsMjUuNTMxMjVjMCw1LjM3NSAxLjYxMjUsMTAuNjE1NjMgNC44Mzc1LDE0LjkxNTYyYzAuMTM0MzcsMC4xMzQzOCAwLjI2ODc1LDAuNDAzMTMgMC40MDMxMiwwLjUzNzVsMjAuMjkwNjMsMjcuNTQ2ODdsMjAuNTU5MzcsLTI3Ljk1YzAsMCAwLDAgMCwtMC4xMzQzN2MzLjM1OTM4LC00LjMgNC45NzE4OCwtOS41NDA2MyA0Ljk3MTg4LC0xNC45MTU2M2MwLC0xNC4xMDkzNyAtMTEuNDIxODcsLTI1LjUzMTI1IC0yNS41MzEyNSwtMjUuNTMxMjV6IiBmaWxsPSIjYzRkYWRkIj48L3BhdGg+PHBhdGggZD0iTTExMy4yNzgxMyw0Ny4wMzEyNWMtMi4wMTU2MiwtMi42ODc1IC0zLjA5MDYyLC02LjA0Njg3IC0zLjA5MDYyLC05LjQwNjI1YzAsLTguODY4NzUgNy4yNTYyNSwtMTYuMTI1IDE2LjEyNSwtMTYuMTI1YzguODY4NzUsMCAxNi4xMjUsNy4yNTYyNSAxNi4xMjUsMTYuMTI1YzAsMy4zNTkzOCAtMS4wNzUsNi43MTg3NSAtMy4wOTA2Miw5LjQwNjI1bC0xMy4wMzQzNywxNy43Mzc1eiIgZmlsbD0iIzI3YWI0YSI+PC9wYXRoPjxwYXRoIGQ9Ik0xMjYuMzEyNSw2OC44Yy0xLjM0Mzc1LDAgLTIuNDE4NzUsLTAuNjcxODcgLTMuMjI1LC0xLjYxMjVsLTEzLjAzNDM3LC0xNy43Mzc1Yy0yLjU1MzEzLC0zLjQ5Mzc1IC0zLjg5Njg3LC03LjUyNSAtMy44OTY4NywtMTEuODI1YzAsLTExLjE1MzEzIDkuMDAzMTIsLTIwLjE1NjI1IDIwLjE1NjI1LC0yMC4xNTYyNWMxMS4xNTMxMiwwIDIwLjE1NjI1LDkuMDAzMTIgMjAuMTU2MjUsMjAuMTU2MjVjMCw0LjMgLTEuMzQzNzUsOC4zMzEyNSAtMy43NjI1LDExLjgyNWwtMTMuMTY4NzUsMTcuNzM3NWMtMC44MDYyNSwwLjk0MDYzIC0xLjg4MTI1LDEuNjEyNSAtMy4yMjUsMS42MTI1ek0xMjYuMzEyNSwyNS41MzEyNWMtNi43MTg3NSwwIC0xMi4wOTM3NSw1LjM3NSAtMTIuMDkzNzUsMTIuMDkzNzVjMCwyLjU1MzEzIDAuODA2MjUsNC45NzE4NyAyLjI4NDM4LDcuMTIxODhsOS44MDkzOCwxMy4zMDMxM2w5LjgwOTM3LC0xMy4zMDMxM2MxLjQ3ODEzLC0yLjAxNTYyIDIuMjg0MzgsLTQuNDM0MzggMi4yODQzOCwtNi45ODc1YzAsLTYuODUzMTMgLTUuMzc1LC0xMi4yMjgxMyAtMTIuMDkzNzUsLTEyLjIyODEzek0xNDUuMTI1LDE1OC41NjI1aC0xLjM0Mzc1Yy0yLjI4NDM4LDAgLTQuMDMxMjUsLTEuNzQ2ODcgLTQuMDMxMjUsLTQuMDMxMjVjMCwwIDAsMCAwLC0wLjEzNDM3Yy0wLjgwNjI1LC0xLjYxMjUgLTAuNTM3NSwtMy42MjgxMyAwLjgwNjI1LC00LjgzNzVjMS42MTI1LC0xLjQ3ODEzIDQuMTY1NjIsLTEuMzQzNzUgNS42NDM3NSwwLjI2ODc1bDEuODgxMjUsMi4wMTU2MmMxLjA3NSwxLjIwOTM4IDEuMzQzNzUsMi44MjE4NyAwLjY3MTg3LDQuM2MtMC41Mzc1LDEuNDc4MTIgLTIuMDE1NjIsMi40MTg3NSAtMy42MjgxMiwyLjQxODc1ek0xMjcuNjU2MjUsMTU4LjU2MjVoLTQuMDMxMjVjLTIuMjg0MzgsMCAtNC4wMzEyNSwtMS43NDY4NyAtNC4wMzEyNSwtNC4wMzEyNWMwLC0yLjI4NDM3IDEuNzQ2ODcsLTQuMDMxMjUgNC4wMzEyNSwtNC4wMzEyNWg0LjAzMTI1YzIuMjg0MzgsMCA0LjAzMTI1LDEuNzQ2ODcgNC4wMzEyNSw0LjAzMTI1YzAsMi4yODQzOCAtMS43NDY4Nyw0LjAzMTI1IC00LjAzMTI1LDQuMDMxMjV6TTEwNy41LDE1OC41NjI1aC00LjAzMTI1Yy0yLjI4NDM3LDAgLTQuMDMxMjUsLTEuNzQ2ODcgLTQuMDMxMjUsLTQuMDMxMjVjMCwtMi4yODQzNyAxLjc0Njg4LC00LjAzMTI1IDQuMDMxMjUsLTQuMDMxMjVoNC4wMzEyNWMyLjI4NDM3LDAgNC4wMzEyNSwxLjc0Njg3IDQuMDMxMjUsNC4wMzEyNWMwLDIuMjg0MzggLTEuNzQ2ODgsNC4wMzEyNSAtNC4wMzEyNSw0LjAzMTI1ek04Ny4zNDM3NSwxNTguNTYyNWgtNC4wMzEyNWMtMi4yODQzNywwIC00LjAzMTI1LC0xLjc0Njg3IC00LjAzMTI1LC00LjAzMTI1YzAsLTIuMjg0MzcgMS43NDY4OCwtNC4wMzEyNSA0LjAzMTI1LC00LjAzMTI1aDQuMDMxMjVjMi4yODQzNywwIDQuMDMxMjUsMS43NDY4NyA0LjAzMTI1LDQuMDMxMjVjMCwyLjI4NDM4IC0xLjc0Njg4LDQuMDMxMjUgLTQuMDMxMjUsNC4wMzEyNXpNNjcuMTg3NSwxNTguNTYyNWgtNC4wMzEyNWMtMi4yODQzOCwwIC00LjAzMTI1LC0xLjc0Njg3IC00LjAzMTI1LC00LjAzMTI1YzAsLTIuMjg0MzcgMS43NDY4NywtNC4wMzEyNSA0LjAzMTI1LC00LjAzMTI1aDQuMDMxMjVjMi4yODQzOCwwIDQuMDMxMjUsMS43NDY4NyA0LjAzMTI1LDQuMDMxMjVjMCwyLjI4NDM4IC0xLjc0Njg3LDQuMDMxMjUgLTQuMDMxMjUsNC4wMzEyNXpNMTMyLjM1OTM4LDE0NC43MjE4OGMtMS4wNzUsMCAtMi4xNSwtMC40MDMxMyAtMi45NTYyNSwtMS4zNDM3NWwtMi42ODc1LC0yLjk1NjI1Yy0xLjQ3ODEzLC0xLjYxMjUgLTEuMzQzNzUsLTQuMTY1NjMgMC4yNjg3NSwtNS42NDM3NWMxLjYxMjUsLTEuNDc4MTIgNC4xNjU2MywtMS4zNDM3NSA1LjY0Mzc1LDAuMjY4NzVsMi42ODc1LDIuOTU2MjVjMS40NzgxMiwxLjYxMjUgMS4zNDM3NSw0LjE2NTYyIC0wLjI2ODc1LDUuNjQzNzVjLTAuNjcxODcsMC42NzE4OCAtMS43NDY4NywxLjA3NSAtMi42ODc1LDEuMDc1ek0xMTguNzg3NSwxMjkuOTQwNjNjLTEuMDc1LDAgLTIuMTUsLTAuNDAzMTMgLTIuOTU2MjUsLTEuMzQzNzVsLTIuNjg3NSwtMi45NTYyNWMtMS40NzgxMiwtMS42MTI1IC0xLjM0Mzc1LC00LjE2NTYzIDAuMjY4NzUsLTUuNjQzNzVjMS42MTI1LC0xLjQ3ODEzIDQuMTY1NjIsLTEuMzQzNzUgNS42NDM3NSwwLjI2ODc1bDIuNjg3NSwyLjk1NjI1YzEuNDc4MTIsMS42MTI1IDEuMzQzNzUsNC4xNjU2MyAtMC4yNjg3NSw1LjY0Mzc1Yy0wLjgwNjI1LDAuNjcxODggLTEuNzQ2ODgsMS4wNzUgLTIuNjg3NSwxLjA3NXpNMTA1LjA4MTI1LDExNS4wMjVjLTEuMDc1LDAgLTIuMTUsLTAuNDAzMTIgLTIuOTU2MjUsLTEuMzQzNzVsLTIuNjg3NSwtMi45NTYyNWMtMS40NzgxMiwtMS42MTI1IC0xLjM0Mzc1LC00LjE2NTYyIDAuMjY4NzUsLTUuNjQzNzVjMS42MTI1LC0xLjQ3ODEyIDQuMTY1NjMsLTEuMzQzNzUgNS42NDM3NSwwLjI2ODc1bDIuNjg3NSwyLjk1NjI1YzEuNDc4MTMsMS42MTI1IDEuMzQzNzUsNC4xNjU2MyAtMC4yNjg3NSw1LjY0Mzc1Yy0wLjY3MTg3LDAuODA2MjUgLTEuNzQ2ODcsMS4wNzUgLTIuNjg3NSwxLjA3NXpNMTA0LjQwOTM4LDk5LjU3MTg4Yy0wLjgwNjI1LDAgLTEuNzQ2ODcsLTAuMjY4NzUgLTIuNDE4NzUsLTAuODA2MjVjLTEuNzQ2ODgsLTEuMzQzNzUgLTIuMTUsLTMuODk2ODggLTAuODA2MjUsLTUuNjQzNzVsMi40MTg3NSwtMy4yMjVjMS4zNDM3NSwtMS43NDY4OCAzLjg5Njg4LC0yLjE1IDUuNjQzNzUsLTAuODA2MjVjMS43NDY4NywxLjM0Mzc1IDIuMTUsMy44OTY4NyAwLjgwNjI1LDUuNjQzNzVsLTIuNDE4NzUsMy4yMjVjLTAuODA2MjUsMS4wNzUgLTIuMDE1NjMsMS42MTI1IC0zLjIyNSwxLjYxMjV6TTExNi41MDMxMyw4My40NDY4OGMtMC44MDYyNSwwIC0xLjc0Njg3LC0wLjI2ODc1IC0yLjQxODc1LC0wLjgwNjI1Yy0xLjc0Njg4LC0xLjM0Mzc1IC0yLjE1LC0zLjg5Njg3IC0wLjgwNjI1LC01LjY0Mzc1bDIuNDE4NzUsLTMuMjI1YzEuMzQzNzUsLTEuNzQ2ODcgMy44OTY4OCwtMi4xNSA1LjY0Mzc1LC0wLjgwNjI1YzEuNzQ2ODcsMS4zNDM3NSAyLjE1LDMuODk2ODcgMC44MDYyNSw1LjY0Mzc1bC0yLjQxODc1LDMuMjI1Yy0wLjgwNjI1LDEuMDc1IC0yLjAxNTYzLDEuNjEyNSAtMy4yMjUsMS42MTI1eiIgZmlsbD0iI2M0ZGFkZCI+PC9wYXRoPjxnIGZpbGw9IiNlNzRjM2MiPjxwYXRoIGQ9Ik00NS42ODc1LDkxLjM3NWMtNy40MjEzMywwIC0xMy40Mzc1LDYuMDE2MTcgLTEzLjQzNzUsMTMuNDM3NWMwLDcuNDIxMzMgNi4wMTYxNywxMy40Mzc1IDEzLjQzNzUsMTMuNDM3NWM3LjQyMTMzLDAgMTMuNDM3NSwtNi4wMTYxNyAxMy40Mzc1LC0xMy40Mzc1YzAsLTcuNDIxMzMgLTYuMDE2MTcsLTEzLjQzNzUgLTEzLjQzNzUsLTEzLjQzNzV6Ij48L3BhdGg+PC9nPjwvZz48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSJNODYsMTcyYy00Ny40OTY0OSwwIC04NiwtMzguNTAzNTEgLTg2LC04NnYwYzAsLTQ3LjQ5NjQ5IDM4LjUwMzUxLC04NiA4NiwtODZ2MGM0Ny40OTY0OSwwIDg2LDM4LjUwMzUxIDg2LDg2djBjMCw0Ny40OTY0OSAtMzguNTAzNTEsODYgLTg2LDg2eiIgZmlsbD0ibm9uZSI+PC9wYXRoPjxwYXRoIGQ9Ik04NiwxNjguNTZjLTQ1LjU5NjYzLDAgLTgyLjU2LC0zNi45NjMzNyAtODIuNTYsLTgyLjU2djBjMCwtNDUuNTk2NjMgMzYuOTYzMzcsLTgyLjU2IDgyLjU2LC04Mi41NnYwYzQ1LjU5NjYzLDAgODIuNTYsMzYuOTYzMzcgODIuNTYsODIuNTZ2MGMwLDQ1LjU5NjYzIC0zNi45NjMzNyw4Mi41NiAtODIuNTYsODIuNTZ6IiBmaWxsPSJub25lIj48L3BhdGg+PC9nPjwvc3ZnPg==">
            <span  class="title">Route</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/route') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/route') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Station Route Lists
                </a>
            </li>

            <li {!! (Request::is('admin/route/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/route/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add Station Route
                </a>
            </li>
        </ul>
    </li>

          {{-- Buses --}}
    <li {!! (Request::is('admin/bus') || Request::is('admin/seat')|| Request::is('admin/bus/create') || Request::is('admin/bus/*') || Request::is('admin/seat/*')  ? 'class="active"' : '') !!}>
        <a style="margin-left: -1%;" href="#">
            <img style="margin-top: -2%;"  src="https://img.icons8.com/color/23/000000/bus.png">
            <span style="margin-left: 2%" class="title">Bus</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/bus') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/bus') }}">
                    <i class="fa fa-angle-double-right"></i>
                    bus Lists
                </a>
            </li>

            <li {!! (Request::is('admin/bus/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/bus/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New bus
                </a>
            </li>
        </ul>

    </li>

    {{-- Driver --}}
    <li {!! (Request::is('admin/driver') || Request::is('admin/driver/create') || Request::is('admin/driver/*')   ? 'class="active"' : '') !!}>
        <a style="margin-left: -2%;" href="#">
            <img style="margin-top: -4%;" src="https://img.icons8.com/color/25/000000/driver.png">
            <span style="margin-left: 2%" class="title">Driver</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/driver') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/driver') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Driver Lists
                </a>
            </li>

            <li {!! (Request::is('admin/driver/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/driver/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New Driver
                </a>
            </li>
        </ul>
    </li>

    {{-- Rider --}}
    {{-- <li {!! (Request::is('admin/rider') || Request::is('admin/rider/create') || Request::is('admin/rider/*')   ? 'class="active"' : '') !!}>
        <a style="margin-left: -2%;" href="{{ URL::to('admin/rider') }}">
            <img style="margin-top: -4%;" src="https://img.icons8.com/color/26/000000/passenger.png">
            <span style="margin-left: 2%" class="title">Rider</span> --}}
            {{-- <span class="fa arrow"></span> --}}
        {{-- </a> --}}
        {{-- <ul class="sub-menu">
            <li {!! (Request::is('admin/rider') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/rider') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Rider Lists
                </a>
            </li>

            <li {!! (Request::is('admin/rider/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/rider/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New Rider
                </a>
            </li>
        </ul> --}}
    {{-- </li> --}}
    
    {{-- Schedule --}}
    <li {!! (Request::is('admin/schedule') || Request::is('admin/schedule/create') || Request::is('admin/schedule/*')   ? 'class="active"' : '') !!}>
        <a style="margin-left: 0%;"  href="{{ URL::to('admin/schedule') }}">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABlgAAAZYBofSv5QAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAH6SURBVDiN7ZM9axVhEIWf8+5NQoqAXlJZRJs0FhoLA371RqKCCIKFEC1EC3+CWPiBiCAoWEVQm6CCIgoWNqJpjGnERgKiCAnpVCKYkDvHIuZm7+7mGhurDGwxw5lzzsy8C+vxJzR9cM8lWWfaYBqgt42O+RPZr65E5rvATiBbrcHy7VoKui02ttf3gdpC1+nInARDf3Obgu5aoXbHwcNMLAI4aYvtK0AvRG8yWFoe9inyfKs+g8BmgDzxl0jpViLGoln3Y+SrWNdKM+BXBHP5mhJ9uEhsj3bSmA1rKNcNiBDni8SCc4hGLq/bbFjOV4iTXyw63ZDoNwwsoX1TZlzW+zKxToX9LVc4C5wsETtSSHw1zCGmABQsBkxLhFxaxcvmuisitSbxCPORYJJgkqTPm56Pv65qzFKjf8HU8x/mQcmxEhcjUh9ia9OViZnhvQOIbZh3eeJGZFOdbRznjsd+ysAEjOBSHUtHs/D3ppAYERwvO7YPC32oUg9pjAK77OuRexUJ6nnEyvGk+2YFWPDXA7xpZdY9wj+biCW1Y6AdLcSYy8Cnll7osRit1mI7icKfp3rJMeKI4UehvaN6AgAfqtp9mRgG2xz5n6NGyp4RMbsaQCgLoikqeII1YbzKPYCUTazZwezw7l0zw/sG19yw1vAFkql46f87fgP9/cB2LacxiQAAAABJRU5ErkJggg==">
            
            <span style="margin-left: 3%" class="title">Schedule</span>
            {{-- <span class="fa arrow"></span> --}}
        </a>
        {{-- <ul class="sub-menu">
            <li {!! (Request::is('admin/schedule') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/schedule') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Schedule Lists
                </a>
            </li>

            <li {!! (Request::is('admin/schedule/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/schedule/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New Schedule
                </a>
            </li>
        </ul> --}}
    </li>

    {{-- Queue --}}
    <li {!! (Request::is('admin/queue') || Request::is('admin/queue/create') || Request::is('admin/queue/*')   ? 'class="active"' : '') !!}>
        <a style="margin-left: -2%;" href="{{ URL::to('admin/queue') }}">
            <img style="margin-top: -2%;" src="https://img.icons8.com/color/26/000000/overtime.png">
            <span style="margin-left: 3%" class="title">Bus Queue</span>
            {{-- <span class="fa arrow"></span> --}}
        </a>
        {{-- <ul class="sub-menu">
            <li {!! (Request::is('admin/queue') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/queue') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Queue Lists
                </a>
            </li>

            <li {!! (Request::is('admin/queue/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/queue/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add Bus to the Queue
                </a>
            </li>
        </ul> --}}
    </li>

    {{-- Reserve --}}
    {{-- <li {!! (Request::is('admin/reserve') || Request::is('admin/reserve/create') || Request::is('admin/reserve/*')   ? 'class="active"' : '') !!}>
        <a style="margin-left: -1%;" href="{{ URL::to('admin/reserve') }}">
            <img style="margin-top: -4%;"  src="https://img.icons8.com/color/25/000000/ticket-purchase.png">
            <span style="margin-left: 2%" class="title">Bus Reservation</span> --}}
            {{-- <span  class="fa arrow"></span> --}}
        {{-- </a> --}}
        {{-- <ul class="sub-menu">
            <li {!! (Request::is('admin/reserve') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/reserve') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Reserved Seat Lists
                </a>
            </li>

            <li {!! (Request::is('admin/reserve/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/reserve/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Reserve Seat
                </a>
            </li>
        </ul> --}}
    {{-- </li> --}}

    {{-- Accident --}}
    <li {!! (Request::is('admin/accident') || Request::is('admin/accident/create') || Request::is('admin/accident/*')   ? 'class="active"' : '') !!}>
        <a style="margin-left: -1%;" href="#">
            <img  style="margin-top: -2%;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVEiJvZVfbFNlFMB/57tdq1NBMQhthxqJCWGuihEBY8gGXdHEDCNJIcbgtnag8mZiwsNMwHdNNOGhrkU0PjWSKChZaMsCMWqMZgbxAUxEAm3FkGWZM3Htvff4wFpu62hdNJyne/7c8zvnfOfeD26BSCtndzbrn14286kKT6B8ds/Ukn0/xeOV/xUSymcSoGkAVdmD0fOiugeRHzDOkVLf3mv/GRLOZ75VdD1o0Reo9thz/ovA0nn3HMJRhVR5a/JM6FRmAFc/FvRgMTrytjePaQVR9OH5WjJOJbDTAwAIoLwoyulQPjOO2F+BnFbkzeY8bSDsB6ZwTFpV97aI3IZjHXOcSgJhdFGQcjSZKllXVhifGwQe87h+VlfWC/KUx7bJsnz5jqpzdFEQAPoO2K4rr3iqLhqbjeVY4jtRM+uJHAf5xPZZX64qpFYvCvLgxAd3I7qzjhDJXnkmOQWg2MOe0FQpmnxL0Xcctc6ET75f79zXDlJx7N0gnTVdlNiqk5mQIzykosladyWr+DlAKTpyKFhIz2BMDtX7ENG2EJDmA+92jBYbQ+QEfQfsmuraTFoWvyOi0GZcwUJ6M7C2bRnoJa9uGSLA2ZreEiLQYm1viIr5senFiCJ1200hK08cXo6y418wZit+JhqgSo+ItoeYDh0EAq2yC/wiSOza04k/GuxCxDVWG4iqIK2+cFD0I+lc8kgxmvjaa+8aTy8D7vqtd7B+Tj6A5ROH7vQ5geMCawT266nDZWC1J+MxDLMou+YLu1CeWjpMNO78g25pBJVztc2qQzrs215FtPd6r3pZYJ/eeO2LUn9yO0A4n3YVXgKuEo87XfmxiItkRXWw2D/yDYBrZAOezapDEB2a1y8I/vOuVgc8MecAunJjvS4SAgXoCefTL7vKKIacIsfDE2PrXEdGUQZE9QUvpHYmndenwhF1q0N4/wTKumAhvdkVyYNuqcUrvI4hV9qafM3BbDBV4wrE/Za1ttZVQydqdIe4ctAoZ1VINsxYiIkSa7Apk6X+5EaAlYXMs8Z1HrWFBwQz+Wvf0DRN4gMobxn5HngOIJgfmxFkE7CiOdgj79UeLNWEitwhwkWQNxYKXvD67c5m/dP3zmxXZRiI0bjqc8C7gAqEFR53HP+TV7ft/vNmFbW84wFCudT9iHkekdubfar8FbCsDxca0S2XvwFUMle0SdZ2YQAAAABJRU5ErkJggg==">
            <span style="margin-left: 3%" class="title">Accident</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/accident') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/accident') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Accident Lists
                </a>
            </li>

            <li {!! (Request::is('admin/accident/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/accident/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New Accident
                </a>
            </li>
        </ul>
    </li>

    {{-- Bus Stop --}}
    {{-- <li {!! (Request::is('admin/busstop') || Request::is('admin/busstop/create') || Request::is('admin/busstop/*')   ? 'class="active"' : '') !!}>
        <a style="margin-left: -1%;" href="#">
           <img style="margin-top: -3%;" width="10%" src="{{ asset('assets/img/bus-stop.png') }}" alt="">
            <span style="margin-left: 3%" class="title">Bus Stop</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/busstop') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/busstop') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Bus Stop List
                </a>
            </li>

            <li {!! (Request::is('admin/busstop/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/busstop/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add Bus Stop
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- users --}}
    <li {!! (Request::is('admin/users') || Request::is('admin/users/create') || Request::is('admin/user_profile') || Request::is('admin/users/*') || Request::is('admin/deleted_users') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">Users</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/users') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/users') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Users
                </a>
            </li>
            <li {!! (Request::is('admin/users/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/users/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New User
                </a>
            </li>
            {{-- <li {!! ((Request::is('admin/users/*')) && !(Request::is('admin/users/create')) ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::route('admin.users.show',Sentinel::getUser()->id) }}">
                    <i class="fa fa-angle-double-right"></i>
                    View Profile
                </a>
            </li> --}}
            <li {!! (Request::is('admin/deleted_users') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/deleted_users') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Deleted Users
                </a>
            </li>
        </ul>
    </li>

    {{-- Seat --}}
    {{-- <li {!! (Request::is('admin/seat') || Request::is('admin/seat/create') || Request::is('admin/seat/*')   ? 'class="active"' : '') !!}>
        <a style="margin-left: -1%;" href="#">
            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABuwAAAbsBOuzj4gAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAANySURBVEiJlZVNTBNbGIbf055OZ4TSakHai80FREgwBkODwWgUxLi6XONGo0YxrtS40YUu3JD4s9BoYmKixhhjopiISkLMzb2IP7HJjSKiaERNIQqWCgW09GeYzkx7XEAbWqc/vLvzfe95nzMz+c4QzOllU5NVZzRuiSpKb/2jR29sQIwxAUAdgEIALwgh3nhPBwBPGxp4rqDAVVpb22ayWp+/2ry5fAHhGwD0A+gC0A6ghzF2KQnAU1q22G4vyrda4aipsRny81tzDM8HcB3ACgDGubwSAHsZY3sSAElV3aLfPw0ABp4H5fn6XqfTkANjHQCHRt0EYH8C0PjsmapIkg+MAQCWOBwOUly8LQfAqrmTa8mUAACAqqouKRwGAFjsdp7y/KEcALqcDerMTHvQ5/MDACEEvMm0vKehwZZl/xAANU1PTAIMWyxvgpOTE/F1UVlZicFsPpwF8BSAR6MuAfgnCbC9vT2qRCLj8bVgNhM9pX9nSieE/ABwJgUSAuACcDYJAACqojyZCQQS64Li4mU9TU11WSDXAGwCcB7AHQAthJAthJAYAJD55peNjTW26urHSysqrGokAs+HD1BEMQhgdL6PMSbKqnqjrrPzErIoCcAAMrBz56fyNWsq/V4vCCEw2+2aG8fcbv+PkZH9zocPOzIBaAqN9UvSd8ZYZYHNhnG3G1MeTywSCr1nWh+TsbxsT0BTC7Isd0nT0xsFiwX2qiowxnSfXS6xtqPjr2xhuQEUpTMwMXFEsFgKgdmZWGQ2l/dt3fp/xiRCfEwUTzq7ul4nlVN9DCADO3Z8LK+vr1rISaOqim/9/Z6psbF167u7R+L130adAEyWZS+LxRaSDz2lKCwtXSZw3Kb5dc27JKYoV8cHB3+yucsvF8WiUfi+fPk2I8tPUg6srd7m5l1Rg3AwWlSyVg0GfHmhiT4tX9jyxwadntK8ae+/sVDodOo3yKgrpx7c+u9un3jheFtzOs/lk/dvd3e8Uy6eaGvR6me8bjnesHrSNzkeEIKP03mksHhNUVRRyBN2a/XTvqLzR29WVqyuej76dVTWU1xJ52MxQo288QCl+tCQ31jd2tqYdH3/NgeJjRyt43luyUpntQHA6XQ+YHZWRoe9vkXh4T8x+4/IDuDCU/c+vR1glBO4TOFxRZTI1LFz+4ZS678AMgZPfA9e9+UAAAAASUVORK5CYII=">
            <span style="margin-left: 4%" class="title">Seat</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/seat') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/seat') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Seat
                </a>
            </li>

            <li {!! (Request::is('admin/seat/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/seat/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add seat
                </a>
            </li>
        </ul>
    </li> --}}
    
    {{-- Dashboard 2 --}}
    {{-- <li {!! (Request::is('admin/index1') ? 'class="active"' : '') !!}>
        <a href="{{  URL::to('admin/index1') }}">
            <i class="livicon" data-name="dashboard" data-size="18" data-c="#EF6F6C" data-hc="#EF6F6C"
               data-loop="true"></i>
            Dashboard 2
        </a>
    </li> --}}

    {{-- Generator Builder --}}
    {{-- <li {!! (Request::is('admin/generator_builder') ? 'class="active"' : '') !!}>
        <a href="{{  URL::to('admin/generator_builder') }}">
            <i class="livicon" data-name="shield" data-size="18" data-c="#F89A14" data-hc="#F89A14"
               data-loop="true"></i>
            Generator Builder
        </a>
    </li> --}}

    {{-- Log viewer --}}
    {{-- <li {!! (Request::is('admin/log_viewers') || Request::is('admin/log_viewers/logs')  ? 'class="active"' : '') !!}>

        <a href="{{  URL::to('admin/log_viewers') }}">
            <i class="livicon" data-name="help" data-size="18" data-c="#1DA1F2" data-hc="#1DA1F2"
               data-loop="true"></i>
            Log Viewer
        </a>
    </li> --}}

    {{-- Activiy Log --}}
    <li {!! (Request::is('admin/activity_log') ? 'class="active"' : '') !!}>
        <a href="{{  URL::to('admin/activity_log') }}">
            <i class="livicon" data-name="eye-open" data-size="18" data-c="#F89A14" data-hc="#F89A14"
               data-loop="true"></i>
            Activity Log
        </a>
    </li>

    {{-- Laravel Examples --}}
    {{-- <li {!! (Request::is('admin/datatables') || Request::is('admin/editable_datatables') || Request::is('admin/dropzone') || Request::is('admin/multiple_upload') || Request::is('admin/custom_datatables')|| Request::is('admin/selectfilter') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="medal" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">Laravel Examples</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/datatables') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/datatables') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Ajax Data Tables
                </a>
            </li>
            <li {!! (Request::is('admin/editable_datatables') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/editable_datatables') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Editable Data Tables
                </a>
            </li>
            <li {!! (Request::is('admin/custom_datatables') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/custom_datatables') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Custom Datatables
                </a>
            </li>
            <li {!! (Request::is('admin/dropzone') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/dropzone') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Drop Zone
                </a>
            </li>
            <li {!! (Request::is('admin/multiple_upload') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/multiple_upload') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Multiple File Upload
                </a>
            </li>
            <li {!! (Request::is('admin/selectfilter') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/selectfilter') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Select2 Filters
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- Charts
    <li {!! ( Request::is('admin/laravel_chart') || Request::is('admin/database_chart') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="barchart" data-size="18" data-c="#418BCA" data-hc="#418BCA"
               data-loop="true"></i>
            <span class="title">Laravel Charts</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/laravel_chart') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/laravel_chart') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Simple charts
                </a>
            </li>
            <li {!! (Request::is('admin/database_chart') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/database_chart') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Database Charts
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- form builder --}}
    {{-- <li {!! (Request::is('admin/form_builder') || Request::is('admin/form_builder2') || Request::is('admin/buttonbuilder') || Request::is('admin/gridmanager') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="wrench" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">Builders</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/form_builder') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/form_builder') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Form Builder
                </a>
            </li>
            <li {!! (Request::is('admin/form_builder2') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/form_builder2') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Form Builder 2
                </a>
            </li>
            <li {!! (Request::is('admin/buttonbuilder') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/buttonbuilder') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Button Builder
                </a>
            </li>
            <li {!! (Request::is('admin/gridmanager') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/gridmanager') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Page Builder
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- form_examples --}}
    {{-- <li {!! (Request::is('admin/form_examples') || Request::is('admin/editor') || Request::is('admin/editor2')
        || Request::is('admin/form_layout') || Request::is('admin/validation') || Request::is('admin/formelements') || Request::is('admin/dropdowns')
        || Request::is('admin/radio_checkbox') || Request::is('admin/ratings') || Request::is('admin/form_layouts') || Request::is('admin/formwizard')
        || Request::is('admin/accordionformwizard') || Request::is('admin/datepicker') | Request::is('admin/advanced_datepickers')? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="doc-portrait" data-c="#67C5DF" data-hc="#67C5DF"
               data-size="18" data-loop="true"></i>
            <span class="title">Forms</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/form_examples') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/form_examples') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Form Examples
                </a>
            </li>
            <li {!! (Request::is('admin/editor') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/editor') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Form Editors
                </a>
            </li>
            <li {!! (Request::is('admin/editor2') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/editor2') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Form Editors2
                </a>
            </li>
            <li {!! (Request::is('admin/validation') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/validation') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Form Validation
                </a>
            </li>
            <li {!! (Request::is('admin/formelements') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/formelements') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Form Elements
                </a>
            </li>
            <li {!! (Request::is('admin/dropdowns') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/dropdowns') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Drop Downs
                </a>
            </li>
            <li {!! (Request::is('admin/radio_checkbox') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/radio_checkbox') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Radio and Checkbox
                </a>
            </li>
            <li {!! (Request::is('admin/ratings') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/ratings') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Ratings
                </a>
            </li>
            <li {!! (Request::is('admin/form_layouts') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/form_layouts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Form Layouts
                </a>
            </li>
            <li {!! (Request::is('admin/formwizard') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/formwizard') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Form Wizards
                </a>
            </li>
            <li {!! (Request::is('admin/accordionformwizard') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/accordionformwizard') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Accordion Wizards
                </a>
            </li>

            <li {!! (Request::is('admin/datepicker') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/datepicker') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Date Pickers
                </a>
            </li>
            <li {!! (Request::is('admin/advanced_datepickers') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/advanced_datepickers') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Advanced Date Pickers
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- UI Features  --}}
    {{-- <li {!! (Request::is('admin/animatedicons') || Request::is('admin/buttons') || Request::is('admin/advanced_buttons') || Request::is('admin/tabs_accordions') || Request::is('admin/panels') || Request::is('admin/icon') || Request::is('admin/color') || Request::is('admin/grid') || Request::is('admin/carousel') || Request::is('admin/advanced_modals') || Request::is('admin/tagsinput') || Request::is('admin/nestable_list') || Request::is('admin/sortable_list') || Request::is('admin/toastr') || Request::is('admin/notifications')|| Request::is('admin/treeview_jstree')|| Request::is('admin/sweetalert') || Request::is('admin/session_timeout') || Request::is('admin/portlet_draggable') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="brush" data-c="#F89A14" data-hc="#F89A14" data-size="18"
               data-loop="true"></i>
            <span class="title">UI Features</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/animatedicons') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/animatedicons') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Animated Icons
                </a>
            </li>
            <li {!! (Request::is('admin/buttons') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/buttons') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Buttons
                </a>
            </li>
            <li {!! (Request::is('admin/advanced_buttons') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/advanced_buttons') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Advanced Buttons
                </a>
            </li>
            <li {!! (Request::is('admin/tabs_accordions') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/tabs_accordions') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Tabs and Accordions
                </a>
            </li>
            <li {!! (Request::is('admin/panels') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/panels') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Panels
                </a>
            </li>
            <li {!! (Request::is('admin/icon') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/icon') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Font Icons
                </a>
            </li>
            <li {!! (Request::is('admin/color') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/color') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Color Picker Slider
                </a>
            </li>
            <li {!! (Request::is('admin/grid') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/grid') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Grid Layout
                </a>
            </li>
            <li {!! (Request::is('admin/carousel') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/carousel') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Carousel
                </a>
            </li>
            <li {!! (Request::is('admin/advanced_modals') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/advanced_modals') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Advanced Modals
                </a>
            </li>
            <li {!! (Request::is('admin/tagsinput') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/tagsinput') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Tags Input
                </a>
            </li>
            <li {!! (Request::is('admin/nestable_list') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/nestable_list') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Nestable List
                </a>
            </li>

            <li {!! (Request::is('admin/sortable_list') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/sortable_list') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Sortable List
                </a>
            </li>

            <li {!! (Request::is('admin/treeview_jstree') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/treeview_jstree') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Treeview and jsTree
                </a>
            </li>

            <li {!! (Request::is('admin/toastr') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/toastr') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Toastr Notifications
                </a>
            </li>

            <li {!! (Request::is('admin/sweetalert') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/sweetalert') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Sweet Alert
                </a>
            </li>

            <li {!! (Request::is('admin/notifications') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/notifications') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Notifications
                </a>
            </li>
            <li {!! (Request::is('admin/session_timeout') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/session_timeout') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Session Timeout
                </a>
            </li>
            <li {!! (Request::is('admin/portlet_draggable') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/portlet_draggable') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Draggable Portlets
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- UI Component --}}
    {{-- <li {!! (Request::is('admin/general') || Request::is('admin/pickers') || Request::is('admin/x-editable') || Request::is('admin/timeline') || Request::is('admin/transitions') || Request::is('admin/sliders') || Request::is('admin/knob') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="lab" data-c="#EF6F6C" data-hc="#EF6F6C" data-size="18"
               data-loop="true"></i>
            <span class="title">UI Components</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/general') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/general') }}">
                    <i class="fa fa-angle-double-right"></i>
                    General Components
                </a>
            </li>
            <li {!! (Request::is('admin/pickers') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/pickers') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Pickers
                </a>
            </li>
            <li {!! (Request::is('admin/x-editable') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/x-editable') }}">
                    <i class="fa fa-angle-double-right"></i>
                    X-editable
                </a>
            </li>
            <li {!! (Request::is('admin/timeline') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/timeline') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Timeline
                </a>
            </li>
            <li {!! (Request::is('admin/transitions') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/transitions') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Transitions
                </a>
            </li>
            <li {!! (Request::is('admin/sliders') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/sliders') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Sliders
                </a>
            </li>
            <li {!! (Request::is('admin/knob') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/knob') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Circles Sliders
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- Datatables --}}
    {{-- <li {!! (Request::is('admin/simple_table') || Request::is('admin/responsive_tables') || Request::is('admin/advanced_tables') || Request::is('admin/advanced_tables2') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="table" data-c="#418BCA" data-hc="#418BCA" data-size="18"
               data-loop="true"></i>
            <span class="title">DataTables</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/simple_table') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/simple_table') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Simple tables
                </a>
            </li>
            <li {!! (Request::is('admin/advanced_tables') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/advanced_tables') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Advanced Data Tables
                </a>
            </li>
            <li {!! (Request::is('admin/advanced_tables2') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/advanced_tables2') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Advanced Data Tables2
                </a>
            </li>

            <li {!! (Request::is('admin/responsive_tables') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/responsive_tables') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Responsive Datatables
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- Charts --}}
    {{-- <li {!! (Request::is('admin/charts') || Request::is('admin/piecharts') || Request::is('admin/charts_animation') || Request::is('admin/jscharts') || Request::is('admin/sparklinecharts') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="barchart" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
               data-loop="true"></i>
            <span class="title">Charts</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/charts') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/charts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Flot Charts
                </a>
            </li>
            <li {!! (Request::is('admin/piecharts') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/piecharts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Pie Charts
                </a>
            </li>
            <li {!! (Request::is('admin/charts_animation') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/charts_animation') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Animated Charts
                </a>
            </li>
            <li {!! (Request::is('admin/jscharts') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/jscharts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    JS Charts
                </a>
            </li>
            <li {!! (Request::is('admin/sparklinecharts') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/sparklinecharts') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Sparkline Charts
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- Calender --}}
    {{-- <li {!! (Request::is('admin/calendar') ? 'class="active"' : '') !!}>
        <a href="{{ URL::to('admin/calendar') }}">
            <i class="livicon" data-c="#F89A14" data-hc="#F89A14" data-name="calendar" data-size="18"
               data-loop="true"></i>
            Calendar
            <span class="badge badge-danger event_count">7</span>
        </a>
    </li> --}}

    {{-- Email --}}
    {{-- <li {!! (Request::is('admin/inbox') || Request::is('admin/compose') || Request::is('admin/view_mail') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="mail" data-size="18" data-c="#67C5DF" data-hc="#67C5DF"
               data-loop="true"></i>
            <span class="title">Email</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/inbox') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/inbox') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Inbox
                </a>
            </li>
            <li {!! (Request::is('admin/compose') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/compose') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Compose
                </a>
            </li>
            <li {!! (Request::is('admin/view_mail') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/view_mail') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Single Mail
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- Task  --}}
    {{-- <li {!! (Request::is('admin/tasks') ? 'class="active"' : '') !!}>
        <a href="{{ URL::to('admin/tasks') }}">
            <i class="livicon" data-c="#EF6F6C" data-hc="#EF6F6C" data-name="list-ul" data-size="18"
               data-loop="true"></i>
            Tasks
            <span class="badge badge-danger" id="taskcount">{{ Request::get('tasks_count') }}</span>
        </a>
    </li> --}}

    
    {{-- Gallery --}}
    {{-- <li {!! (Request::is('admin/gallery') || Request::is('admin/masonry_gallery') || Request::is('admin/imagecropping') || Request::is('admin/imgmagnifier') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="image" data-c="#418BCA" data-hc="#418BCA" data-size="18"
               data-loop="true"></i>
            <span class="title">Gallery</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/gallery') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/gallery') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Gallery
                </a>
            </li>
            <li {!! (Request::is('admin/masonry_gallery') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/masonry_gallery') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Masonry Gallery
                </a>
            </li>
            <li {!! (Request::is('admin/imagecropping') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/imagecropping') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Image Cropping
                </a>
            </li>
            <li {!! (Request::is('admin/imgmagnifier') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/imgmagnifier') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Image Magnifier
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- Test --}}
    {{-- <li {!! (Request::is('admin/tests') || Request::is('admin/tests/create') || Request::is('admin/tests/*')   ? 'class="active"' : '') !!}>
            <a href="#">
                <i class="livicon" data-name="user" data-size="18" data-c="#6CC66C" data-hc="#6CC66C"
                   data-loop="true"></i>
                <span class="title">Test</span>
                <span class="fa arrow"></span>
            </a>
            <ul class="sub-menu">
                <li {!! (Request::is('admin/tests') ? 'class="active" id="active"' : '') !!}>
                    <a href="{{ URL::to('admin/tests') }}">
                        <i class="fa fa-angle-double-right"></i>
                        Test
                    </a>
                </li>

                <li {!! (Request::is('admin/tests/create') ? 'class="active" id="active"' : '') !!}>
                    <a href="{{ URL::to('admin/tests/create') }}">
                        <i class="fa fa-angle-double-right"></i>
                        Add New Test
                    </a>
                </li>
            </ul>
    </li> --}}

    {{-- Groups  --}}
    {{-- <li {!! (Request::is('admin/groups') || Request::is('admin/groups/create') || Request::is('admin/groups/*') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="users" data-size="18" data-c="#418BCA" data-hc="#418BCA"
               data-loop="true"></i>
            <span class="title">Groups</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/groups') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/groups') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Group List
                </a>
            </li>
            <li {!! (Request::is('admin/groups/create') ? 'class="active" id="active"' : '') !!}>
                <a href="{{ URL::to('admin/groups/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New Group
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- Googel map --}}
    <li {!! (Request::is('admin/googlemaps') || Request::is('admin/vectormaps') || Request::is('admin/advancedmaps') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="map" data-c="#67C5DF" data-hc="#67C5DF" data-size="18"
               data-loop="true"></i>
            <span class="title">Maps</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/googlemaps') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/googlemaps') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Google Maps
                </a>
            </li>
            <li {!! (Request::is('admin/vectormaps') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/vectormaps') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Vector Maps
                </a>
            </li>
            <li {!! (Request::is('admin/advancedmaps') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/advancedmaps') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Advanced Maps
                </a>
            </li>
        </ul>
    </li>

    {{-- blog --}}
    {{-- <li {!! ((Request::is('admin/blogcategory') || Request::is('admin/blogcategory/create') || Request::is('admin/blog') ||  Request::is('admin/blog/create')) || Request::is('admin/blog/*') || Request::is('admin/blogcategory/*') ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="comment" data-c="#F89A14" data-hc="#F89A14" data-size="18"
               data-loop="true"></i>
            <span class="title">Blog</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/blogcategory') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/blogcategory') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Blog Category List
                </a>
            </li>
            <li {!! (Request::is('admin/blog') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/blog') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Blog List
                </a>
            </li>
            <li {!! (Request::is('admin/blog/create') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/blog/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add New Blog
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- news --}}
    {{-- <li {!! (Request::is('admin/news') || Request::is('admin/news/*')  ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="move" data-c="#ef6f6c" data-hc="#ef6f6c" data-size="18"
               data-loop="true"></i>
            <span class="title">News</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/news') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/news') }}">
                    <i class="fa fa-angle-double-right"></i>
                    News List
                </a>
            </li>
            <li {!! (Request::is('admin/news/create') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/news/create') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Add News
                </a>
            </li>
        </ul>
    </li> --}}

    {{-- mini sidebar --}}
    {{-- <li {!! (Request::is('admin/minisidebar') ? 'class="active"' : '') !!}>
        <a href="{{  URL::to('admin/minisidebar') }}">
            <i class="livicon" data-name="list-ul" data-size="18" data-c="#F89A14" data-hc="#F89A14"
               data-loop="true"></i>
            Mini Sidebar
        </a>
    </li> --}}

    {{-- fixed menu --}}
    {{-- <li {!! (Request::is('admin/fixedmenu') ? 'class="active"' : '') !!}>
        <a href="{{  URL::to('admin/fixedmenu') }}">
            <i class="livicon" data-name="list-ul" data-size="18" data-c="#1DA1F2" data-hc="#1DA1F2"
               data-loop="true"></i>
            Fixed Menu
        </a>
    </li> --}}

    {{-- Invoice --}}
    {{-- <li {!! (Request::is('admin/invoice') || Request::is('admin/blank')  ? 'class="active"' : '') !!}>
        <a href="#">
            <i class="livicon" data-name="flag" data-c="#418bca" data-hc="#418bca" data-size="18"
               data-loop="true"></i>
            <span class="title">Pages</span>
            <span class="fa arrow"></span>
        </a>
        <ul class="sub-menu">
            <li {!! (Request::is('admin/lockscreen') ? 'class="active"' : '') !!}>
                <a href="{{ URL::route('lockscreen',Sentinel::getUser()->id) }}">
                    <i class="fa fa-angle-double-right"></i>
                    Lockscreen
                </a>
            </li>
            <li {!! (Request::is('admin/invoice') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/invoice') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Invoice
                </a>
            </li>
            <li {!! (Request::is('admin/login') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/login') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Login
                </a>
            </li>
            <li {!! (Request::is('admin/login2') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/login2') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Login 2
                </a>
            </li>
            <li>
                <a href="{{ URL::to('admin/login#toregister') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Register
                </a>
            </li>
            <li>
                <a href="{{ URL::to('admin/register2') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Register2
                </a>
            </li>
            <li {!! (Request::is('admin/404') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/404') }}">
                    <i class="fa fa-angle-double-right"></i>
                    404 Error
                </a>
            </li>
            <li {!! (Request::is('admin/500') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/500') }}">
                    <i class="fa fa-angle-double-right"></i>
                    500 Error
                </a>
            </li>
            <li {!! (Request::is('admin/blank') ? 'class="active"' : '') !!}>
                <a href="{{ URL::to('admin/blank') }}">
                    <i class="fa fa-angle-double-right"></i>
                    Blank Page
                </a>
            </li>
        </ul>
    </li> --}}

    <!-- Menus generated by CRUD generator -->
    @include('admin/layouts/menu')
</ul>