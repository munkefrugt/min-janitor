Util.Modules["page"] = new function() {
	this.init = function(page) {

		// header reference
		page.hN = u.qs("#header");
		page.hN.service = u.qs("ul.servicenavigation", page.hN);

		// content reference
		page.cN = u.qs("#content", page);

		// navigation reference
		page.nN = u.qs("#navigation", page);
		page.nN = u.ie(page.hN, page.nN);

		// footer reference
		page.fN = u.qs("#footer");
		page.fN.service = u.qs("ul.servicenavigation", page.fN);


		// global resize handler 
		page.resized = function() {
//			u.bug("page.resized:" + u.nodeId(this));

			// forward scroll event to current scene
			if(this.cN && this.cN.scene && typeof(this.cN.scene.resized) == "function") {
				this.cN.scene.resized();
			}
		}

		// global scroll handler 
		page.scrolled = function() {
//			u.bug("page.scrolled:" + u.nodeId(this))

			// forward scroll event to current scene
			if(this.cN && this.cN.scene && typeof(this.cN.scene.scrolled) == "function") {
				this.cN.scene.scrolled();
			}
		}

		// Page is ready
		page.ready = function() {
			u.bug("page.ready:" + u.nodeId(this));

			// page is ready to be shown - only initalize if not already shown
			if(!this.is_ready) {

				// page is ready
				this.is_ready = true;

				// set resize handler
				u.e.addWindowEvent(this, "resize", this.resized);
				// set scroll handler
				u.e.addWindowEvent(this, "scroll", this.scrolled);

				this.initHeader();
				this.initNavigation();
			}

		}

		// initialize header
		page.initHeader = function() {
			var frontpage_link = u.qs("li.front a", this.nN);
			if(frontpage_link) {
				var logo = u.ae(this.hN, "a", {"class":"logo", "href":frontpage_link.href, "html":frontpage_link.innerHTML});
				u.ce(logo, {"type":"link"});
			}
		}


		// initialize navigation
		page.initNavigation = function() {

			this.nN.list = u.qs("ul.navigation", this.nN);

			// Get initial height of header for collapse
			this.hN.initialHeight = page.hN.offsetHeight;

			// create burger menu
			this.bn_nav = u.qs(".servicenavigation li.navigation", this.hN);
			if(this.bn_nav) {
				u.ae(this.bn_nav, "div");
				u.ae(this.bn_nav, "div");
				u.ae(this.bn_nav, "div");

				// enable nav link
				u.ce(this.bn_nav);
				this.bn_nav.clicked = function(event) {

					// close navigation
					if(this.is_open) {
						// Update open state
						this.is_open = false;
						u.rc(this, "open");


						u.ass(page.hN, {
							"height":page.hN.initialHeight + "px"
						})

						// hide navigation
						u.ass(page.nN, {
							"display": "none"
						});

						// Disable nav scroll 
						u.ass(page.nN, {
							"overflow-y":"hidden"
						});

						// Enable body scroll
						u.ass(page.parentNode, {
							"overflow-y":"scroll"
						});

					}
					// open navigation
					else {
						// Update open state
						this.is_open = true;
						u.ac(this, "open");

						// Clear hN transitioned, in order to prevent bugs
						delete page.hN.transitioned;

						// Set height of hN
						u.ass(page.hN, {
							"height": window.innerHeight+"px",
						});

						// Set height on navigation
						u.ass(page.nN, {
							"height":(window.innerHeight - page.hN.service.offsetHeight) + "px"
						});

						u.ass(page.nN, {
							"display": "block"
						});
						
						// Enable nav scroll 
						u.ass(page.nN, {
							"overflow-y":"scroll"
						});

						// Disable body scroll
						u.ass(page.parentNode, {
							"overflow-y":"hidden"
						});
					}

				}
			}

			var i, node;

			// append footer servicenavigation to header servicenavigation
			if(page.fN.service) {
				nodes = u.qsa("li", page.fN.service);
				for(i = 0; node = nodes[i]; i++) {
					u.ae(page.nN.list, node);
				}
				page.fN.removeChild(page.fN.service);
			}

			// append header servicenavigation to header servicenavigation
			if(page.hN.service) {
				nodes = u.qsa("li:not(.navigation)", page.hN.service);
				for(i = 0; node = nodes[i]; i++) {
					u.ae(page.nN.list, node);
				}
			}

			var i, node, nodes;
			// enable animation on submenus and logo
			nodes = u.qsa("#navigation li,a.logo", page.hN);
			for(i = 0; node = nodes[i]; i++) {

				// build first living proof model of CEL clickableElementLink
				u.ce(node, {"type":"link"});
			}

			// get clean set of navigation nodes (for animation on open and close)
			page.nN.nodes = u.qsa("li", page.nN.list);

			if(page.hN.service) {
				u.ass(page.hN.service, {
					"opacity":1
				});
			}

		}

		// ready to start page builing process
		page.ready();
	}
}

u.e.addDOMReadyEvent(u.init);
