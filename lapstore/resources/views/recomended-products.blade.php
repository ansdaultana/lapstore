<div class="flex flex-col md:flex-row justify-center items-center space-x-3 md:space-x-10 mt-8 mb-10">
  <div class="slider-container">
    <div class="slider">
      @foreach($recommended_products as $product)
      <div class="slider-item w-56 md:w-72">
        <div class="w-56 md:w-72 bg-neutral-800 rounded-xl px-8 py-12 shadow-lg mb-4 transition-transform hover:scale-103 duration-300 ease-in-out hover:cursor-pointer">
          <div class="flex items-center justify-center">
            <img src="{{$product->images[0]->image_url}}" alt="Category Image" class="h-32 md:h-44 w-auto object-cover rounded-md">
  
          </div>
          <h4 class="mt-2 text-xm text-gray-400 ">{{$product->category->name}}</h4>
          <div class="flex justify-between">
          <h4 class=" text-lg text-white ">{{$product->title}} </h4>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-yellow-100 hover:fill-yellow-300 w-6 h-5 m-2">
            <path stroke-linecap="round" stroke-linejoin="round" d="M17.593 3.322c1.1.128 1.907 1.077 1.907 2.185V21L12 17.25 4.5 21V5.507c0-1.108.806-2.057 1.907-2.185a48.507 48.507 0 0111.186 0z" />
          </svg>
          
          
          </div>
          <p class="mt-1 text-md text-gray-200 ">Rs: {{$product->price}}</p>
        
          <div class="flex justify-end ">
            <button class="transition-transform  rounded-full -mt-4  hover:scale-110 duration-300 ease-in-out text-white p-4  bg-gradient-to-r from-orange-300 via-orange-600 to-red-600">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
              </svg>
              
            </button>
          
          </div>
          </div>
      </div>
      @endforeach
    </div>
  </div>
</div>

<style>
  .slider-container {
    overflow: hidden;
    width: 80%;
    max-width: 100%;
  }

  .slider {
    display: flex;
    transition: transform 0.5s ease-in-out;
  }


  @media (min-width: 768px) {
    .slider-item {
      flex: 0 0 auto;
    width: calc(100% / 2); 
    padding: 0 0.5rem;
    box-sizing: border-box;
    }
  }

  @media (min-width: 1024px) {
    .slider-item {
      flex: 0 0 auto;
    padding: 0 0.5rem;
    box-sizing: border-box;
      width: calc(100% / 3); 
    }
  }
</style>

<script>
  const slider = document.querySelector('.slider');
  const items = document.querySelectorAll('.slider-item');
  let itemsPerSlide = window.innerWidth >= 1024 ? 3 : 2;
  let currentIndex = 0;

  function updateSliderPosition() {
    const itemWidth = slider.clientWidth / itemsPerSlide;
    slider.style.transition = 'transform 0.5s ease-in-out';
    slider.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
  }

  function slideNext() {
    currentIndex = (currentIndex + 1) % (items.length - itemsPerSlide + 1);
    updateSliderPosition();
  }

  setInterval(slideNext, 3000); // Slide every 3 seconds

  window.addEventListener('resize', () => {
    itemsPerSlide = window.innerWidth >= 1024 ? 3 : 2;
    updateSliderPosition();
  });

  // Initialize slider position
  updateSliderPosition();
</script>
