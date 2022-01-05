<nav class="bg-gray-800 fixed-top opacity-95">
    <div class="container max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
      <div class="relative flex items-center justify-between h-16">
        <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
          <!-- Mobile menu button-->
          <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-white hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false" data-toggle="offcanvas">
            <span class="sr-only">Open main menu</span>
            <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
            </svg>
            <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
        <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
          <div class="flex-shrink-0 flex items-center">
            <a class="inline-block mr-4 py-0.5 text-xl text-white whitespace-nowrap hover:no-underline focus:no-underline" href="{{ url('/') }}">
              Client Consume
            </a>
          </div>
          <div class="hidden sm:block sm:ml-6">
            <div class="flex space-x-4">
              <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
              <a href="/" class="nav-link page-scroll hover:bg-gray-700 text-white px-3 py-2 rounded-md text-sm font-medium" aria-current="page">Home</a>
            </div>
          </div>
        </div>
        <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">
          @guest
          <div class="ml-3 relative">
            <div class="ml-3 relative space-x-4">
            @if (Route::has('login'))
                <a href="{{ route('login') }}" class="navbar-link page-scroll text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{ __('Login') }}</a>
            @endif

            @if (Route::has('register'))
                <a href="{{ route('register') }}" class="navbar-link page-scroll text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">{{ __('Register') }}</a>
            @endif
            </div>
            @else
            <div>
                <button type="button" id="dropdownButton" data-dropdown-toggle="dropdown" class="bg-gray-800 flex text-sm rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-gray-800 focus:ring-white" id="user-menu-button" aria-expanded="false" aria-haspopup="true" onclick="openDropdown(event,'dropdown-id')">
                <span class="sr-only">Open user menu</span>
                <img class="h-8 w-8 rounded-full" src="{{ Auth::user()->avatar }}" alt="{{ Auth::user()->name }}">
                </button>
            </div>
            <div class="hidden origin-top-right absolute right-0 mt-2 w-48 rounded-md shadow-lg py-1 bg-white ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" id="dropdown-id">
                <!-- Active: "bg-gray-100", Not Active: "" -->
                <a href="#" class="block hover:bg-gray-100 px-4 py-2 text-md font-bold text-gray-800 border-b border-gray-200">Sign in as {{ Auth::user()->name }}</a>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-jet-responsive-nav-link href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-jet-responsive-nav-link>
                </form>
            </div>
        </div>
        @endguest
        </div>
      </div>
    </div>
  
    <!-- Mobile menu, show/hide based on menu state. -->
    <div class="sm:hidden offcanvas-collapse bg-gray-800" id="mobile-menu" >
      <div class="px-2 pt-2 pb-3 space-y-1">
        <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
        <a href="#" class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium" aria-current="page">Dashboard</a>
  
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Team</a>
  
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Projects</a>
  
        <a href="#" class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">Calendar</a>
      </div>
    </div>
  </nav>