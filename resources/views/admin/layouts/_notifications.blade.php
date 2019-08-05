
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

    <a   href="#" class="dropdown-toggle" data-toggle="dropdown">
        <i class="livicon" data-name="bell" data-loop="true" data-color="#e9573f"
           data-hovercolor="#e9573f" data-size="28"></i>
        @if ($user->unreadnotifications()->count())
            <span class="label label-warning"> {{ $user->unreadnotifications()->count() }} </span>
        @endif
            
    </a>
    <ul class=" notifications dropdown-menu drop_notify">
        <li class="dropdown-title">You have 7 notifications</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                    {{-- <li>
                            <span class="circle_created" class="animate_rtl">
                                <img style="margin-top: 0.6rem; margin-left: 0.5rem;" src="https://img.icons8.com/color/26/000000/passenger.png">
                            </span>
                          <span class="animate_rtl"> <a href="#">Jef's Birthday today</a></span>
                          <small class="pull-right timezone">
                              <span class="livicon paddingright_10" data-n="timer" data-s="10"></span>
                              Few seconds ago
                          </small>
                    </li> --}}
                @foreach ( $user->unreadnotifications as $notification )
                    <li style="background-color: lightgray">
                        <?php echo $notification->data['html_icon'] ?>

                        <span class="animate_rtl">
                            <a href="#">&nbsp; {{ $notification->data['user_first_name'].' '.$notification->data['user_last_name']}} &nbsp;
                                {{ $notification->data['message']}} &nbsp; <span style="color: green"> {{ $notification->data['data']}} </span>
                            </a>
                        </span>

                        <small style="color: coral" class="pull-right timezone">
                            <span class="livicon paddingright_10"   data-n="timer" data-s="10"></span>
   
                            {{ $notification->created_at->diffForHumans() }}
                        </small>

                    </li>
                @endforeach
                @foreach ( $user->readnotifications as $notification )
                    <li >
                        <?php echo $notification->data['html_icon'] ?>

                        <span class="animate_rtl">
                            <a href="#">&nbsp; {{ $notification->data['user_first_name'].' '.$notification->data['user_last_name']}} &nbsp;
                                {{ $notification->data['message']}} &nbsp; <span style="color: green"> {{ $notification->data['data']}} </span>
                            </a>
                        </span>

                        <small style="color: coral" class="pull-right timezone">
                            <span class="livicon paddingright_10"   data-n="timer" data-s="10"></span>
   
                            {{ $notification->created_at->diffForHumans() }}
                        </small>

                    </li>
                @endforeach
                
                
               

                
            </ul>
        </li>
        <li class="footer">
            <a href="#">View all</a>
        </li>
    </ul>
</li>