@php
  $all_notifications = auth()->user()->notifications;
  $unread_notifications = $all_notifications->where('read_at', null);
  $total_unread = count($unread_notifications);
  $notifications = $all_notifications->sortByDesc('created_at')->take(10);
@endphp
<!-- Notifications: style can be found in dropdown.less -->
<li class="dropdown notifications-menu">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown" @if(!empty($total_unread))id="show_unread_notifications" @endif>
    <i class="fa fa-bell-o"></i>
    <span class="label label-warning notifications_count">@if(!empty($total_unread)){{$total_unread}}@endif</span>
  </a>
  <ul class="dropdown-menu">
    <li>
      <!-- inner menu: contains the actual data -->
      <ul class="menu">
        @include('layouts.partials.notification_list')
        
        @if(count($all_notifications) > 10)
          <li class="text-center">
            <a href="#" id="load_more_notifications" class="btn btn-link"><small>@lang('lang_v1.load_more')</small></a>
          </li>
        @endif
      </ul>
    </li>
  </ul>
</li>
<input type="hidden" id="notification_page" value="1">