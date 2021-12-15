<div>
    {{-- The Master doesn't talk, he acts. --}}

    <div class="main-content">
        <section class="section">
            <div class="section-body">
                <div class="col-12 col-md-6 col-lg-12">
                    <form class="row " wire:submit.prevent="store" method="POST">
                        @csrf
                        <div class="card d:flex justify-content-between">
                            <div class="card-header">
                                <h4>Sell Stock</h4>
                            </div>
                            <table>
                                <tbody class="section">
                                    <tr>
                                        <td class="col-lg-3">
                                            <label>Customer Tel</label>
                                            <input name="phoneNumber" wire:model="phoneNumber" type="text" class="form-control">
                                            @error('phoneNumber')
                                            <span class="text-red-700">{{$message}}</span>
                                            @enderror
                                        </td>
                                    </tr>
                                    @foreach($items as $index=>$item)
                                    <tr class="py-2">
                                        <td class=" col-lg-3">
                                            <label>Product</label>
                                            <select class="form-control form-control-lg py-1" name="items[{{$index}}][product_id]" wire:model="items.{{$index}}.product_id">
                                                <!-- <select wire:click="changeEvent($event.target.value)" class="form-control" name="items[{{$index}}][product_id]" wire:model="items.{{$index}}.product_id"> -->
                                                <option>select product</option>
                                                @foreach($stocks as $stock)
                                               <option data="{{$stock->remainingQuantity}}" value="{{$stock->product->id}}" {{$stock->product->id==old('id')?'selected':''}}>{{$stock->product->name}} available stock {{$stock->remainingQuantity}}{{$stock->product->category->unity}} </option>
                                                @endforeach
                                                <input hidden name="items[{{$index}}][remainingQuantity]" wire:model="items.{{$index}}.remainingQuantity" type="number" class="form-control ">
                                            </select>
                                            @error('items.'.$index.'.product_id')
                                            <span class="text-red-700">{{$message}}</span>
                                            @enderror
                                        </td>
                                        <td class="col-lg-2">
                                            <label>Sold Quantity</label>
                                            <input name="items[{{$index}}][soldQuantity]" wire:model="items.{{$index}}.soldQuantity" type="number" class="form-control">
                                            @error('items.'.$index.'.soldQuantity')
                                            <span class="text-red-700">{{$message}}</span>
                                            @enderror
                                        </td>
                                        <td class="col-lg-2">
                                            <label>Unity Price</label>
                                            <input name="items[{{$index}}][unityPrice]" wire:model="items.{{$index}}.unityPrice" type="number" class="form-control ">
                                            @error('items.'.$index.'.unityPrice')
                                            <span class="text-red-700">{{$message}}</span>
                                            @enderror
                                        </td>
                                        <td class="form-group col-lg-2">

                                            <label class="form-label "><h1 class="text-xl">Button Input</h1></label>
                                            <div class="selectgroup w-100 ">
                                                <label class="selectgroup-item">
                                                    <button class="selectgroup-button px-4 py-3  " wire:click.prevent="addRow"><span class=" flex justify-center pb-2 text-green-400 font-bold"> <i class="fa fa-plus"></i> <h1 class="flex justify-center px-1"> add</h1></span></button>
                                                </label>
                                                <label class="selectgroup-item">
                                                    <button class="selectgroup-button" wire:click.prevent="removeRow({{$index}})"><i class="fa fa-trash text-red-400" aria-hidden="true"></i> Remove</button>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <div clas="">
                                <button class="bg-yellow-500 mb-2 mt-12 hover:bg-blue-600 text-white font-bold py-3 mr-12  px-8 border border-yellow-500 rounded-md text-2xl md:text-lg " style="float:right; position: relative;"><span class="text-2xl">Sale</span></button>
                               
                            </div">


                            <div>
                            
                        </div>
                    </form>
                </div>


            </div>
        </section>

    </div>


</div>
