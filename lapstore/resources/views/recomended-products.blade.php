
<div class="flex flex-col md:flex-row justify-center items-center space-x-3 md:space-x-10 mt-8 mb-10">
  <div class="slider-container">
    <div class="slider">
      @foreach($recommended_products as $product)
      <div class="slider-item w-56 md:w-72">
      <a href="/products/{{$product->slug}}">

        <div class="w-56 md:w-72 bg-slate-200 rounded-xl px-8 py-12 shadow-lg mb-4 transition-transform hover:scale-103 duration-300 ease-in-out hover:cursor-pointer">
          <div class="flex items-center justify-center">
            <img src="{{$product->images[0]->image_url}}" alt="Category Image" class="h-32 md:h-44 w-auto object-cover rounded-md">
  
          </div>
          <h4 class="mt-2 text-xm text-gray-400 ">{{$product->category->name}}</h4>
          <div class="flex justify-between">
          <h4 class="mt-1 text-md text-gray-700 ">{{$product->title}} </h4>
        
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="text-red-400 hover:fill-red-600 w-6 h-6 m-2 animate-bounce">
            <path stroke-linecap="round" stroke-linejoin="round" d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
          </svg>
          
          </div>
          <p class=" text-md text-gray-700 ">Rs: {{$product->price}}</p>
        
          <div class="flex justify-end ">
            <button class="transition-transform   rounded-full -mt-4  hover:scale-110 duration-300 ease-in-out text-white p-4  bg-gradient-to-r from-orange-300 via-orange-600 to-red-600">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
              </svg>
              
            </button>
          
          </div>
          </div>
      </div>
    </a>
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
  @media (max-width: 767px) {
    .slider-item {
      margin-left: 10px; /* Adjust the margin as needed */
    }}
  
</style>


<script>
  let sliderInterval;

  function setupSlider() {
    const slider = document.querySelector('.slider');
    const items = document.querySelectorAll('.slider-item');
    let itemsPerSlide = window.innerWidth >= 1024 ? 3 : window.innerWidth >= 768 ? 2 : items.length;
    let currentIndex = 0;

    function updateSliderPosition() {
      if (itemsPerSlide === items.length) {
        slider.style.transition = 'none';
        slider.style.transform = 'none';
      } else {
        const itemWidth = slider.clientWidth / itemsPerSlide;
        slider.style.transition = 'transform 0.5s ease-in-out';
        slider.style.transform = `translateX(-${currentIndex * itemWidth}px)`;
      }
    }

    function slideNext() {
      currentIndex = (currentIndex + 1) % (items.length - itemsPerSlide + 1);
      updateSliderPosition();
    }

    clearInterval(sliderInterval);
    if (itemsPerSlide < items.length) {
      sliderInterval = setInterval(slideNext, 3000); // Slide every 3 seconds
    }

    updateSliderPosition();
  }

  function applyFlexCol() {
    const slider = document.querySelector('.slider');
    const items = document.querySelectorAll('.slider-item');
    if (window.innerWidth < 768) {
      slider.style.display = 'flex';
      slider.style.flexDirection = 'column';
      slider.style.alignItems = 'center';
      slider.style.justifyContent = 'center';
      items.forEach(item => {
        item.style.width = '100%';
        item.style.padding = '0';
        item.style.display = 'flex'; // Fix the typo here
        item.style.justifyContent = 'center'; // Add this line to center content horizontally
      });
    } else {
      slider.style.display = 'flex';
      slider.style.flexDirection = 'row';
      slider.style.alignItems = 'center';
      slider.style.justifyContent = 'flex-start';
      items.forEach(item => {
        item.style.width = '';
        item.style.padding = '';
        item.style.display = ''; // Reset the display property
        item.style.justifyContent = ''; // Reset the justify-content property
      });
    }
  }

  // Run the setupSlider and applyFlexCol functions initially and whenever the screen size changes
  setupSlider();
  applyFlexCol();
  window.addEventListener('resize', () => {
    setupSlider();
    applyFlexCol();
  });
</script>


