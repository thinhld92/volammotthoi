jQuery.fn.extend({
    addNavigationLeft: function () {
        //jNavigation class
        $navigation = function (jEl) {
            /*fields*/
            var self = this;
            this.options = {
                event: arguments[1] && arguments[1].event ? arguments[1].event : 0,
                effect: arguments[1] && arguments[1].effect ? arguments[1].effect : false,
                activeSection: arguments[1] && arguments[1].activeSection ? arguments[1].activeSection : null,
                callback: arguments[1] && arguments[1].callback ? arguments[1].callback : null
            }

            /*MAIN*/
            this.navigation = jEl;
            this.navigation.find("li").each(function () {
                var o = $(this);

                if (o.find("> ul").length > 0) {
                    o.addClass("HasChild");
                }

                var onFire;
                o.bind(self.options.event, function (evt) {
                    var leaf = null;
                    o.parent().find("li.Active").each(function () { //find leaf, leaf can be o
                        var el = $(this);
                        if (el.find("li.Active").length <= 0) {
                            leaf = el;
                        }
                    });
                    var onAnimate = false;
                    if (leaf != null && leaf.parent().parent().hasClass("Active") && leaf.html() != o.parent().parent().parent().find("> li.Active").html() && leaf.html() != o.html() || o.parent().find("> li.Active").length > 0) {
                        onFire = false;
                    }
                    else {
                        onFire = true;
                    }

                    try { //find and close all leaf nodes contained in current active nodes which equal-level with o and NOT o
                        if (self.options.effect && self.options.event == "click") {
                            var loop = setInterval(function () {
                                if (leaf != null && leaf.parent().parent().hasClass("Active") && leaf.html() != o.parent().parent().parent().find("> li.Active").html() && leaf.html() != o.html()) {
                                    if (!onAnimate) {
                                        onAnimate = true;
                                        if (leaf.find("> ul:first").length > 0) {
                                            leaf.find("> ul:first").slideUp(100, function () {
                                                leaf.removeClass("Active");
                                                leaf = leaf.parent().parent();
                                                onAnimate = false;
                                            });
                                        }
                                        else {
                                            leaf.removeClass("Active");
                                            leaf = leaf.parent().parent();
                                            onAnimate = false;
                                        }
                                    }
                                }
                                else if (o.parent().find("> li.Active").length > 0 && !onFire) {
                                    clearInterval(loop);
                                    //close node equal-level with o and NOT o
                                    if (o.parent().find("> li.Active").get(0) != o.get(0)) {
                                        if (o.parent().find("> li.Active > ul:first").length > 0) {
                                            o.parent().find("> li.Active > ul:first").slideUp(100, function () {
                                                o.parent().find("> li.Active").removeClass("Active");
                                                onFire = true;
                                            });
                                        }
                                        else {
                                            o.parent().find("> li.Active").removeClass("Active");
                                            onFire = true;
                                        }
                                    }
                                }
                                else {
                                    onFire = true;
                                    clearInterval(loop);
                                }
                            }, 1);
                        }
                        else { //no effect
                            while (leaf != null && leaf.parent().parent().hasClass("Active") && leaf.html() != o.parent().parent().parent().find("> li.Active").html() && leaf.html() != o.html()) {
                                leaf.find("> ul:first").hide();
                                leaf.removeClass("Active");
                                leaf = leaf.parent().parent();
                            }
                            o.parent().find("> li.Active > ul:first").hide();
                            o.parent().find("> li.Active").removeClass("Active");
                        }

                    }
                    catch (err) {
                        //error exception: leaf is not exist !
                    }

                    if (self.options.event == "click") { //open self
                        if (!o.hasClass("Active")) {
                            if (self.options.effect) {
                                var timer = setInterval(function () {
                                    if (onFire) {
                                        clearInterval(timer);
                                        o.addClass("Active");
                                        if (o.find("> ul:first").length > 0) {
                                            o.find("> ul:first").slideDown("normal", function () {
                                                onFire = false;
                                            });
                                        }
                                        else {
                                            onFire = false;
                                        }
                                    }
                                }, 1);
                            }
                            else {
                                o.addClass("Active");
                                o.find("> ul:first").show();
                            }
                        }
                        else { //close self
                            if (self.options.effect) { //close the parent most Active
                                if (o.find("> ul:first").length > 0) {
                                    o.find("> ul:first").slideUp("normal", function () {
                                        o.removeClass("Active");
                                    });
                                }
                                else {
                                    o.removeClass("Active");
                                }
                            }
                            else {
                                o.find("> ul:first").hide();
                                o.removeClass("Active");
                            }
                        }
                    }
                    else { // not click event
                        /*if ( self.options.effect ) {
                         o.addClass("Active");
                         o.find("> ul:first").slideDown("normal");
                         }
                         else {*/
                        o.addClass("Active");
                        o.find("> ul:first").show();
                        //    }
                    }

                    /*to be refactoried: add to slideDown("normal"); methods*/
                    if (typeof( o.find("> ul:first").css("position") ) != "undefined" && o.find("> ul:first").css("position").match(/absolute|relative/)) {//have position
                        if (o.offset().left + o.find("> ul:first").outerWidth() * 2 > $(window).width()) {
                            o.find("> ul:first").addClass("ToRight");
                        }
                    }
                    /*end.to be refactoried: add to slideDown("normal"); methods*/

                    evt.stopPropagation();
                });
            });
            $(document).bind(self.options.event, function (evt) {
                /*
                 if ( self.navigation.find("li.Active").length > 0 ) {
                 self.refresh(self.options.event);
                 }
                 evt.stopPropagation();
                 */
            });

            /*methods*/
            this.setActive = function () {
                try {
                    this.activeSection = self.options.activeSection;
                    if (this.activeSection != null) {
                        var active = this.activeSection.replace(/[a-zA-Z]/g, "").toString().split("_");
                    }
                    var item = this.navigation.find("> li");
                    do {
                        item = item.eq(active[0] - 1);
                        item.addClass("Hilite");
                        item = item.find("ul:first > li");
                        active.splice(0, 1);
                    } while (active.length > 0)
                }
                catch (err) {
                    //Error exception
                }
            }
            this.refresh = function (evt) {
                var leaf = null;
                this.navigation.find("li.Active").each(function () {
                    var o = $(this);
                    if (o.find("li.Active").length <= 0) {
                        leaf = o;
                    }
                });

                //LOOP
                var onAnimate = false;
                try {
                    if (self.options.effect && evt == "click") {
                        var loop = setInterval(function () {
                            if (leaf != null && leaf.hasClass("Active")) {
                                //find and close all leaf nodes
                                if (!onAnimate) {
                                    onAnimate = true;
                                    if (leaf.find("> ul:first").length > 0) {
                                        leaf.find("> ul:first").slideUp(100, function () {
                                            leaf.removeClass("Active");
                                            leaf = leaf.parent().parent();
                                            onAnimate = false;
                                        });
                                    }
                                    else {
                                        leaf.removeClass("Active");
                                        leaf = leaf.parent().parent();
                                        onAnimate = false;
                                    }
                                }
                            }
                            else {
                                clearInterval(loop);
                            }
                        }, 1);
                    }
                    else {
                        while (leaf != null && leaf.hasClass("Active")) {
                            leaf.find("> ul:first").hide();
                            leaf.removeClass("Active");
                            leaf = leaf.parent().parent();
                        }
                    }
                }
                catch (err) {
                    //exception: can not find leaf
                }
            }

            //init callback
            //this.setActive();
            //callback
            this.setActive();
            if (this.options.callback != null) {
                this.options.callback();
            }
        }

        //setup
        var options = arguments[0];
        this.each(function () {
            new $navigation($(this), options);
        });

        if (jQuery(this + "li.Off a").length > 0) {
            jQuery(this + "li.Off a").click(function () {
                return false;
            })
        }
    }
});