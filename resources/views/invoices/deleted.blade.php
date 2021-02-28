<div class="modal fade" id="exampleModal{{ $invoice->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">حذف الفاتورة</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            <form action="{{ route('invoices.destroy',$invoice->id) }}" method="post">
                {{ method_field('delete') }}
                {{ csrf_field() }}
        </div>
        <div class="modal-body">
            هل انت متاكد من عملية الحذف ؟
            <input type="hidden" name="invoice_id" id="invoice_id" value="">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">الغاء</button>
            <button type="submit" class="btn btn-danger">تاكيد</button>
        </div>
        </form>
    </div>
</div>
</div>