class Search {
    // 1. Initiate search object
    constructor() {
        // Getting the DOM elements
        this.openSearch = document.querySelectorAll('.js-search-trigger');
        this.closeSearch = document.querySelector( '.search-overlay__close');
        this.searchOverlay = document.querySelector('.search-overlay');
        this.searchField = document.querySelector('#search-term');
        this.searchResultDiv = document.querySelector('.search-overlay__results');
        this.events();
        this.isOverlayOpen = false;
        this.isSpinnerVisible = false;
        this.prevInputVal = '';
        this.typingTimer;
    }

    // 2. Triggering search events
    events() {
      // this.openSearch.forEach(function (el, self) {
      //     el.addEventListener("click", self.openSearchOverlay.bind(this));
      // })

        this.openSearch.forEach(el => {
            el.addEventListener("click", e => {
                e.preventDefault();
                this.openSearchOverlay();
            });
        });

        this.closeSearch.addEventListener("click", this.closeSearchOverlay.bind(this));
        document.addEventListener('keyup', this.keyDispatcherEvent.bind(this));

        this.searchField.addEventListener('keyup', this.typingLogic.bind(this));
    }
    // 3. Event Methods
    openSearchOverlay() {
        this.searchOverlay.classList.add('search-overlay--active');
        document.body.classList.add('body-no-scroll');
        this.isOverlayOpen = true;
        this.searchField.value = '';
        setTimeout( () => this.searchField.focus(), 300);
    }

    closeSearchOverlay() {
        this.searchOverlay.classList.remove('search-overlay--active');
        document.body.classList.remove('body-no-scroll');
        this.isOverlayOpen = false;
    }

    keyDispatcherEvent(e) {
        // if "s" key is pressed and isOverlayOpen is set to false then open the overlay
        if ( e.keyCode === 83 && !this.isOverlayOpen && document.activeElement.tagName !== 'INPUT' && document.activeElement.tagName !== 'TEXTAREA') {
            this.openSearchOverlay();
        }

        // if "esc" key is pressed and isOverlayOpen is set to true then close the overlay
        if ( e.keyCode === 27 && this.isOverlayOpen ) {
            this.closeSearchOverlay();
        }
    }

    typingLogic(e) {
        clearTimeout(this.typingTimer);

        // Preventing running spinner when navigating to the input field
        if ( this.searchField.value !== this.prevInputVal ) {
            // Disabling the spinner when the search field is empty
            if ( this.searchField.value ) {
                // Enabling spinner when user is typing on the input field
                if ( !this.isSpinnerVisible ) {
                    this.searchResultDiv.innerHTML = "<div class='spinner-loader'></div>";
                    this.isSpinnerVisible = true;
                }
                // Displaying search results
                this.typingTimer = setTimeout(() =>{
                    this.getSearchResults();
                }, 750);
            } else {
                this.searchResultDiv.innerHTML = '';
                this.isSpinnerVisible = false;
            }
        }
        this.prevInputVal = this.searchField.value;
    }

    getSearchResults() {
        this.searchResultDiv.innerHTML = "Search result displayed here";
        this.isSpinnerVisible = false;
    }
}

export default Search;