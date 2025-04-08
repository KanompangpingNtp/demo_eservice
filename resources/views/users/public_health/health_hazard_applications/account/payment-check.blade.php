@extends('admin.layout.layout')
@section('admin_content')
<div class="container">
    <h2 class="text-center mb-4">แบบคำร้องใบอณุญาตประกอบกิจการที่เป็นอันตรายต่อสุขภาพ</h2><br>

    <form action="{{route('HealthHazardApplicationPaymentSave')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row g-3 mb-3">
            <div class="col-md-12">
                <h5>ยอดเงินที่ต้องชำระ 1000 บาท</h5>
            </div>
            <div class="col-md-10">
                <img src="{{asset('/images/payment/POZY-ANIMAL-QR-CODE-1024x1024.png')}}" width="40%">
            </div>
            <div class="col-md-12">
                <label for="formFile" class="form-label">หลักฐานการชำระเงิน : </label>
                <div class="mt-2">
                    <input type="file" id="file_option4" class="form-control-file" name="file">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary py-1"><i class="fa fa-save"></i></i> ยืนยันการชำระเงิน</button>
        <input type="hidden" name="id" value="{{ old('id', $form->id) }}">
    </form>
</div>

<script src="{{asset('js/multipart_files.js')}}"></script>
@endsection

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js" defer></script>