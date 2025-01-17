// V0.1
// API
// Example:
// var obj = AnchorTriggre( listOfAnchorNames, callback, [options] )
// 
// listOfAnchorNames // ARRAY || array containing the names of anchors to watch
// callback // FUNCTION || function to callback when within a certain anchor
// 
// options is an obj with the following properties, default value given.
// {
//  query: 'a',        // STRING || tags to query as anchors. 
//                     //   Could give class, ie. a.foobar would search a tags 
//                     //   with class foobar
//                     
//  onlyOnChange: true // BOOLEAN || Only call callback when anchor has changed.
//  fraction: .5,      // INTEGER || fraction of page (top to bottom or left to right) 
//                     //   to trigger new area.
//  delay: 50,         // INTEGER || Delay to throttle calls during scroll
//       
//  bind: window,      // OBJ || The element we are watching for scroll. 
//                     //   Pass the element itself, not a string.
//                     
//  flow: 'top',       // STRING || Direction of scroll flow. Options are 
//                     //   'top'  -- as in top to bottom
//                     //   'left' -- as in left to right

//  alwaysCallback: undefined   // FUNCTION || This is a callback that is always 
//                              //   called even when trigger remains the same.
// } 

var AnchorTrigger = function( anchors, callback, options ){
  var self = this;

  // set default constructor parameters
  options = options || {};

  // set instance attributes
  self.innerSizeFor = {};
  self.onlyOnChange = options.onlyOnChange || true;
  self.fraction = options.fraction !== undefined ? options.fraction : .5;
  self.anchorsQuery = options.query || 'a';
  self.flow = [ 'top','left' ].filter( function( item ){ return options.flow==item } ).lengths || 'top';
  var bindToElement = self.bindToElement = options.bind || window;
  var delay = options.delay || 50;

  self.lastAnchor = '';
  self.anchorNames = anchors || [];
  self.callback = callback || function(){};
  self.alwaysCallback = options.alwaysCallback || undefined;
  self.query = self.anchorNames
      .map(function(item){
        return self.anchorsQuery+'[name="'+item+'"]'})
      .join(', ');

  //////////////////////////////////
  
  self.elements = Array.prototype.slice.call( document.querySelectorAll( self.query ) );
  self.calculateElementPositions.bind( self )();


  // set default local scope variables

  self.scrollBehavior = self.scrollBehavior.bind( self )
  self.resizeBehavior = self.resizeBehavior.bind( self )
  var throttledScrollBehavior = self.throttle( self.scrollBehavior, delay,{ trailling: false } );
  var throttledResizeBehavior = self.throttle( self.resizeBehavior, delay,{ trailling: false } );
  bindToElement.addEventListener( 'scroll', throttledScrollBehavior );
  bindToElement.addEventListener( 'resize', throttledResizeBehavior );

  self.resizeBehavior();
  self.scrollBehavior();

}

AnchorTrigger.prototype = {
  now: Date.now || function() { return new Date().getTime(); },
  // Throttle function from Underscore JS: 
  // https://github.com/jashkenas/underscore/blob/v1.9.0/underscore.js#L785
  throttle: function( func, wait, options ) {
    var self = this
    var timeout, context, args, result;
    var previous = 0;
    if (!options) options = {};

    var later = function() {
      previous = options.leading === false ? 0 : self.now();
      timeout = null;
      result = func.apply( context, args );
      if ( !timeout ) context = args = null;
    };

    var throttled = function() {
      var now = self.now();
      if ( !previous && options.leading === false ) previous = now;
      var remaining = wait - ( now - previous );
      context = this;
      args = arguments;
      if ( remaining <= 0 || remaining > wait ) {
        if ( timeout ) {
          clearTimeout(timeout);
          timeout = null;
        }
        previous = now;
        result = func.apply( context, args );
        if ( !timeout ) context = args = null;
      } else if ( !timeout && options.trailing !== false ) {
        timeout = setTimeout( later, remaining );
      }
      return result;
    };

    throttled.cancel = function() {
      clearTimeout( timeout );
      previous = 0;
      timeout = context = args = null;
    };

    return throttled;
  },
  resizeBehavior: function(){
    var self = this;
    self.innerSizeFor.top = self.bindToElement.innerWidth;
    self.innerSizeFor.left = self.bindToElement.innerHeight;
  },
  scrollBehavior: function(){
    self = this;
    self.scrollPosition = {
      top: document.body.scrollTop,
      left: document.body.scrollLeft,
    };


    var offset = self.innerSizeFor[ self.flow ] * self.fraction;
    var nav = self.elementPositions
      .filter(function( element ){
          return element.cumlativePosition[ self.flow ] - offset <= self.scrollPosition[ self.flow ];
        })
      .slice( -1 )[ 0 ];
    if ( self.lastAnchor !== nav.name ){
      self.lastAnchor = nav.name;
      self.calculateElementPositions();
      self.callback.call( self,nav ); 
    }
    if ( self.alwaysCallback ) {
      self.callback.call( self,nav );
    }
    // =console.log(elements)
  },
  cumulativeOffset: function( element ) {
    var top = 0, left = 0;
    do {
        top += element.offsetTop  || 0;
        left += element.offsetLeft || 0;
        element = element.offsetParent;
    } while( element );

    return {
        top: top,
        left: left
    };
  },
  calculateElementPositions: function(){
    var self = this;

    self.elementPositions = self.elements.map( function( DOMelement ){
      return {
        name: DOMelement.name, 
        element: DOMelement, 
        cumlativePosition: self.cumulativeOffset( DOMelement ), 
        scrollPosition: self.scrollPosition 
      };
    })
  },
}

 