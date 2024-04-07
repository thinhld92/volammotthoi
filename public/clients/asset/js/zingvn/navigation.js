jQuery.fn.extend({
    addNavigation: function () {
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

                o.bind(self.options.event, function (evt) {
                    var leaf = null;
                    o.parent().find("li.Active").each(function () { //find leaf, leaf can be o
                        var el = $(this);
                        if (el.find("li.Active").length <= 0) {
                            leaf = el;
                        }
                    });
                    try {
                        while (leaf.parent().parent().hasClass("Active") && leaf.html() != o.parent().parent().parent().find("> li.Active").html() && leaf.html() != o.html()) {
                            //find and close all leaf nodes contained in nodes which equal-level with o and NOT o
                            if (self.options.effect) {
                                leaf.find("> ul:first").hide("normal");
                            }
                            else {
                                leaf.find("> ul:first").hide();
                            }
                            leaf.removeClass("Active");
                            leaf = leaf.parent().parent();
                        }
                        //close node equal-level with o and NOT o
                        if (o.parent().find("> li.Active").html() != o.html()) {
                            if (self.options.effect) {
                                o.parent().find("> li.Active ul").hide("normal");
                            }
                            else {
                                o.parent().find("> li.Active ul").hide();
                            }
                            o.parent().find("> li.Active").removeClass("Active");
                        }
                    }
                    catch (err) {
                        //error exception: leaf is not exist !
                    }

                    /*to be refactoried: add to show("normal"); methods*/
                    if (typeof( o.find("> ul:first").css("position") ) != "undefined" && o.find("> ul:first").css("position").match(/absolute|relative/)) {//have position
                        this.zindex = 1000;
                        o.css({
                            zIndex: self.zindex++
                        });
                        if (o.offset().left + o.find("> ul:first").outerWidth() * 2 > $(window).width()) {
                            o.find("> ul:first").addClass("ToRight");
                        }
                    }
                    /*end.to be refactoried: add to show("normal"); methods*/

                    if (self.options.event == "click") {
                        if (!o.hasClass("Active")) {
                            o.addClass("Active");
                            if (self.options.effect) {
                                o.find("> ul:first").show("normal");
                            }
                            else {
                                o.find("> ul:first").show();
                            }
                        }
                        else {
                            o.removeClass("Active");
                            if (self.options.effect) {
                                o.find("> ul:first").hide("normal");
                            }
                            else {
                                o.find("> ul:first").hide();
                            }
                        }
                    }
                    else {
                        o.addClass("Active");
                        if (self.options.effect) {
                            o.find("> ul:first").show("normal");
                        }
                        else {
                            o.find("> ul:first").show();
                        }
                    }

                    evt.stopPropagation();
                });
            });
            $(document).bind(self.options.event, function (evt) {
                if (self.navigation.find("li.Active").length > 0) {
                    self.refresh();
                }
                evt.stopPropagation();
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
            this.refresh = function () {
                self.zindex = 1000; //reset zindex value
                var leaf = null;
                this.navigation.find("li.Active").each(function () {
                    var o = $(this);
                    if (o.find("li.Active").length <= 0) {
                        leaf = o;
                    }
                });

                do {
                    if (self.options.effect) {
                        leaf.find("> ul:first").hide("normal");
                    }
                    else {
                        leaf.find("> ul:first").hide();
                    }
                    leaf.removeClass("Active");
                    leaf = leaf.parent().parent();
                } while (leaf.parent().parent().hasClass("Active"));
                if (self.options.effect) {
                    this.navigation.find("> li.Active > ul").hide("normal");
                }
                else {
                    this.navigation.find("> li.Active > ul").hide();
                }
                this.navigation.find("> li.Active").removeClass("Active");
            }

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
    }
});