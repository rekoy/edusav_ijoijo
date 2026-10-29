 @extends('in-layout.in-layout-access')
@section('content')
<section class="bg-white py-6 md:py-10">
  <div class="container mx-auto max-w-7xl px-4 text-center">
    <p class="md:text-4xl text-xl text-black font-bold">Input Retail Code</p>
    <div class="max-w-3xl flex md:flex-row flex-col py-6 mx-auto items-start">
      <form class="w-full space-y-6">
        <div class="grid md:grid-cols-2 grid-cols-1 gap-6">
          <input type="text" placeholder="input kode"
            class="text-sm rounded-md w-full py-3 px-3 border bg-neutral-100 focus:outline-none focus:ring-2 focus:ring-gray-200" />
        </div>
        <div class="flex flex-row gap-2">
          <input type="checkbox" value="true" checked />
          <label>Agree with <span class="font-bold underline cursor-pointer">Terms & Conditions</span></label>
        </div>
        <button type="submit"
          class="w-full bg-omarcogreen hover:bg-green-600 text-white font-semibold p-3 rounded-md transition-colors duration-200 flex items-center justify-center">Submit
        </button>
      </form>
    </div>
  </div>
</section>
@endsection 
