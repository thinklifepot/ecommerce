
<form class="form-horizontal" action="{{ route('commissions.pay_to_seller') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h4 class="modal-title" id="myModalLabel">{{translate('Pay to seller')}}</h4>
    </div>

    <div class="modal-body">
        <div>
            <table class="table table-responsive">
                <tbody>
                    <tr>
                        @if($seller->admin_to_pay >= 0)
                            <td>{{ translate('Due to seller') }}</td>
                            <td>{{ single_price($seller->admin_to_pay) }}</td>
                        @endif
                    </tr>
                    <tr>
                        @if($seller_withdraw_request->amount > $seller->admin_to_pay)
                            <td>{{ translate('Requested Amount is ') }}</td>
                            <td>{{ single_price($seller_withdraw_request->amount) }}</td>
                        @endif
                    </tr>
                </tbody>
            </table>
        </div>

        @if ($seller->admin_to_pay > 0)
            <input type="hidden" name="seller_id" value="{{ $seller->id }}">
            <input type="hidden" name="payment_withdraw" value="withdraw_request">
            <input type="hidden" name="withdraw_request_id" value="{{ $seller_withdraw_request->id }}">
            <div class="form-group">
                <label class="col-sm-3 control-label" for="amount">{{translate('Requested Amount')}}</label>
                <div class="col-sm-9">
                    @if ($seller_withdraw_request->amount > $seller->admin_to_pay)
                        <input type="number" min="0" step="0.01" name="amount" id="amount" value="{{ $seller->admin_to_pay }}" class="form-control" required>
                    @else
                        <input type="number" min="0" step="0.01" name="amount" id="amount" value="{{ $seller_withdraw_request->amount }}" class="form-control" required>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-3 control-label" for="payment_option">{{translate('Payment Method')}}</label>
                <div class="col-sm-9">
                    <select name="payment_option" id="payment_option" class="form-control demo-select2-placeholder" required>
                        <option value="">{{translate('Select Payment Method')}}</option>
                        @if($seller->cash_on_delivery_status == 1)
                            <option value="cash">{{translate('Cash')}}</option>
                        @endif
                        @if($seller->paypal_status == 1)
                            <option value="paypal">{{translate('Paypal')}}</option>
                        @endif
                        @if($seller->stripe_status == 1)
                            <option value="stripe">{{translate('Stripe')}}</option>
                        @endif
                        @if($seller->instamojo_status == 1)
                            <option value="instamojo">{{translate('Instamojo')}}</option>
                        @endif
                        @if($seller->razorpay_status == 1)
                            <option value="razorpay">{{translate('RazorPay')}}</option>
                        @endif
                        @if($seller->paystack_status == 1)
                            <option value="paystack">{{translate('PayStack')}}</option>
                        @endif
                        @if($seller->voguepay_status == 1)
                            <option value="voguepay">{{translate('VoguePay')}}</option>
                        @endif
                        @if($seller->sslcommerz_status == 1)
                            <option value="sslcommerz">{{translate('SSLCommerz')}}</option>
                        @endif
                    </select>
                </div>
            </div>
        @endif

    </div>
    <div class="modal-footer">
        <div class="panel-footer text-right">
            @if ($seller->admin_to_pay > 0)
                <button class="btn btn-purple" type="submit">{{translate('Pay')}}</button>
            @endif
            <button class="btn btn-default" data-dismiss="modal">{{translate('Cancel')}}</button>
        </div>
    </div>
</form>
