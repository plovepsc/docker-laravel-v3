@forelse($notifications as $notification)
  @php
    $msg =  __('lang_v1.recurring_invoice_message', 
              ['invoice_no' => !empty($notification->data['invoice_no']) ? $notification->data['invoice_no'] : '', 'subscription_no' => !empty($notification->data['subscription_no']) ? $notification->data['subscription_no'] : '']);

    $icon_class = "fa fa-recycle text-green";

    if(!empty($notification->data['invoice_status']) && $notification->data['invoice_status'] == 'draft') {
      $msg =  __('lang_v1.recurring_invoice_error_message', 
              ['product_name' => $notification->data['out_of_stock_product'], 'subscription_no' => !empty($notification->data['subscription_no']) ? $notification->data['subscription_no'] : '']);
      $icon_class = "fa fa-exclamation-triangle text-warning";
    }

    $msg_array = [
      'App\Notifications\RecurringInvoiceNotification' => 
      ['msg' => $msg,
        'icon_class' => $icon_class,
        'link' => action('SellPosController@listSubscriptions')
      ]
    ];
  @endphp
  <li class="@if(empty($notification->read_at)) bg-aqua-lite @endif">
    <a href="{{$msg_array[$notification->type]['link'] ?? '#'}}">
      <i class="{{$msg_array[$notification->type]['icon_class'] ?? ''}}"></i> {!! $msg_array[$notification->type]['msg'] ?? '' !!} <br>
      <small>{{$notification->created_at->diffForHumans()}}</small>
    </a>
  </li>
@empty
  @if(empty($from_ajax))
    <li class="text-center">
      @lang('lang_v1.no_notifications_found')
    </li>
  @endif
@endforelse