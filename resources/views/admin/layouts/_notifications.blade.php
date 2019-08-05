
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
                            <span class="circle_accident_created" class="animate_rtl">
                                <img  style="margin-top: 0.7rem; margin-left: 0.7rem;" style="margin-top: -2%;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVEiJvZVfbFNlFMB/57tdq1NBMQhthxqJCWGuihEBY8gGXdHEDCNJIcbgtnag8mZiwsNMwHdNNOGhrkU0PjWSKChZaMsCMWqMZgbxAUxEAm3FkGWZM3Htvff4wFpu62hdNJyne/7c8zvnfOfeD26BSCtndzbrn14286kKT6B8ds/Ukn0/xeOV/xUSymcSoGkAVdmD0fOiugeRHzDOkVLf3mv/GRLOZ75VdD1o0Reo9thz/ovA0nn3HMJRhVR5a/JM6FRmAFc/FvRgMTrytjePaQVR9OH5WjJOJbDTAwAIoLwoyulQPjOO2F+BnFbkzeY8bSDsB6ZwTFpV97aI3IZjHXOcSgJhdFGQcjSZKllXVhifGwQe87h+VlfWC/KUx7bJsnz5jqpzdFEQAPoO2K4rr3iqLhqbjeVY4jtRM+uJHAf5xPZZX64qpFYvCvLgxAd3I7qzjhDJXnkmOQWg2MOe0FQpmnxL0Xcctc6ET75f79zXDlJx7N0gnTVdlNiqk5mQIzykosladyWr+DlAKTpyKFhIz2BMDtX7ENG2EJDmA+92jBYbQ+QEfQfsmuraTFoWvyOi0GZcwUJ6M7C2bRnoJa9uGSLA2ZreEiLQYm1viIr5senFiCJ1200hK08cXo6y418wZit+JhqgSo+ItoeYDh0EAq2yC/wiSOza04k/GuxCxDVWG4iqIK2+cFD0I+lc8kgxmvjaa+8aTy8D7vqtd7B+Tj6A5ROH7vQ5geMCawT266nDZWC1J+MxDLMou+YLu1CeWjpMNO78g25pBJVztc2qQzrs215FtPd6r3pZYJ/eeO2LUn9yO0A4n3YVXgKuEo87XfmxiItkRXWw2D/yDYBrZAOezapDEB2a1y8I/vOuVgc8MecAunJjvS4SAgXoCefTL7vKKIacIsfDE2PrXEdGUQZE9QUvpHYmndenwhF1q0N4/wTKumAhvdkVyYNuqcUrvI4hV9qafM3BbDBV4wrE/Za1ttZVQydqdIe4ctAoZ1VINsxYiIkSa7Apk6X+5EaAlYXMs8Z1HrWFBwQz+Wvf0DRN4gMobxn5HngOIJgfmxFkE7CiOdgj79UeLNWEitwhwkWQNxYKXvD67c5m/dP3zmxXZRiI0bjqc8C7gAqEFR53HP+TV7ft/vNmFbW84wFCudT9iHkekdubfar8FbCsDxca0S2XvwFUMle0SdZ2YQAAAABJRU5ErkJggg==">
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