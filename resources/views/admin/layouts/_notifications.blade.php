
<li id="markAsRead" onclick="markNotificationAsRead" class="dropdown notifications-menu rtl_list">
    
    <?php

        $user_id = Sentinel::getUser()->id;
        $user = App\User::find($user_id);
        // foreach ($user->unreadnotifications as $notification) {
        //     echo $notification->type;
        // }
        // return $user->unreadnotifications()->count();

        // {{ $notification->data['bus_icon'] }}
        
    ?>

    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="livicon" data-name="bell" data-loop="true" data-color="#e9573f"
            data-hovercolor="#e9573f" data-size="28"></i>
        @if ($user->unreadnotifications()->count())
            <span class="label label-warning"> {{ $user->unreadnotifications()->count() }} </span>
        @endif
    </a>

    <ul overflow: auto; class=" notifications dropdown-menu drop_notify">
        <li class="dropdown-title">You have 7 notifications</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul overflow: auto; class="menu">
                    {{-- <li>
                            <span class="circle_created" class="animate_rtl">
                                <img  style="margin-top: 0.5rem; margin-left: 0.5rem;" src="https://img.icons8.com/color/26/000000/overtime.png">
                            </span>
                          <span class="animate_rtl"> <a href="#">Jef's Birthday today</a></span>
                          <small class="pull-right timezone">
                              <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                              Few seconds ago
                          </small>
                    </li> --}}
                @foreach ( $user->unreadnotifications as $notification )
                    @if ($notification->type == 'App\Notifications\AccidentAdded')
                        <li style="background-color: lightgray; white-space: nowrap;">
                            <?php echo $notification->data['html_icon'] ?>
                            <span class="animate_rtl">
                                <a href="#">&nbsp; <span style="color: green"> {{ $notification->data['data']}} </span> &nbsp; {{ $notification->data['message']}}
                                      by {{ $notification->data['user_first_name'].' '.$notification->data['user_last_name']}}
                                </a>
                            </span>
                            <small style="color: coral" class="pull-right timezone">
                                <span class="livicon paddingright_10"   data-n="timer" data-s="10"></span>
                                {{ $notification->created_at->diffForHumans() }}
                            </small>

                        </li>
                    @elseif($notification->type == 'App\Notifications\AccidentRemoved')
                        <li  style="background-color: lightgray; white-space: nowrap; ">
                            <?php echo $notification->data['html_icon'] ?>

                            <span class="animate_rtl">
                                <a href="#">&nbsp; {{ $notification->data['user_first_name'].' '.$notification->data['user_last_name']}} 
                                   remved <span style="color: green"> {{ $notification->data['data']}} </span>'s accident 
                                </a>
                            </span>

                            <small style="color: coral" class="pull-right timezone">
                                <span class="livicon paddingright_10"   data-n="timer" data-s="10"></span>

                                {{ $notification->created_at->diffForHumans() }}
                            </small>

                        </li>
                    @else
                        <li style="background-color: lightgray; white-space: nowrap;">
                            <?php echo $notification->data['html_icon'] ?>

                            <span class="animate_rtl">
                                <a href="#">&nbsp; {{ $notification->data['user_first_name'].' '.$notification->data['user_last_name']}} 
                                    {{ $notification->data['message']}} <span style="color: green"> {{ $notification->data['data']}} </span>
                                </a>
                            </span>

                            <small style="color: coral" class="pull-right timezone">
                                <span class="livicon paddingright_10"   data-n="timer" data-s="10"></span>

                                {{ $notification->created_at->diffForHumans() }}
                            </small>

                        </li>
                    @endif
                @endforeach

                @foreach ( $user->readnotifications as $notification )
                    @if ($notification->type == 'App\Notifications\AccidentAdded')
                        <li style="white-space: nowrap;">
                            <?php echo $notification->data['html_icon'] ?>

                            <span class="animate_rtl">
                                <a href="#">&nbsp; <span style="color: green"> {{ $notification->data['data']}} </span> &nbsp; {{ $notification->data['message']}}
                                     by  {{ $notification->data['user_first_name'].' '.$notification->data['user_last_name']}}
                                </a>
                            </span>

                            <small style="color: coral" class="pull-right timezone">
                                <span class="livicon paddingright_10"   data-n="timer" data-s="10"></span>

                                {{ $notification->created_at->diffForHumans() }}
                            </small>

                        </li>
                    @elseif($notification->type == 'App\Notifications\AccidentRemoved')
                        <li  style="white-space: nowrap;">
                            <?php echo $notification->data['html_icon'] ?>

                            <span class="animate_rtl">
                                <a href="#">&nbsp; {{ $notification->data['user_first_name'].' '.$notification->data['user_last_name']}} 
                                   remved <span style="color: green"> {{ $notification->data['data']}} </span>'s accident 
                                </a>
                            </span>

                            <small style="color: coral" class="pull-right timezone">
                                <span class="livicon paddingright_10"   data-n="timer" data-s="10"></span>

                                {{ $notification->created_at->diffForHumans() }}
                            </small>

                        </li>
                    @else
                        <li style="white-space: nowrap;" >
                            <?php echo $notification->data['html_icon'] ?>

                            <span class="animate_rtl">
                                <a href="#">&nbsp; {{ $notification->data['user_first_name'].' '.$notification->data['user_last_name']}} 
                                    {{ $notification->data['message']}}  <span style="color: green"> {{ $notification->data['data']}} </span>
                                </a>
                            </span>

                            <small style="color: coral" class="pull-right timezone">
                                <span class="livicon paddingright_10"   data-n="timer" data-s="10"></span>
    
                                {{ $notification->created_at->diffForHumans() }}
                            </small>

                        </li>
                    @endif
                @endforeach
                
                
               

                
            </ul>
        </li>
        <li class="footer">
            <a href="#">View all</a>
        </li>
    </ul>
</li>