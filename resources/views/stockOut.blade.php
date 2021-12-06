@extends('layouts.header')
@section('content')

<style>
    .text-red-700 {
        color: red;
    }
</style>



@livewire('stock-out')
<!-- <script>
    function getQuantity(e) {

        var selectBox = document.getElementById("product_id").value;
        alert(selectBox);
        // var selectedValue = selectBox.options[selectBox.selectedIndex].getAttribute("data-quantity");
        document.getElementById("quantity").value = selectBox;
        e.preventDefault();
    }
</script> -->



@endsection
