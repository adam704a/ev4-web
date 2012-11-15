if (typeof(MooTools) != 'undefined'){

    var DropdownMaxiMenu = new Class({
        Implements: Options,
        options: {    //options par d�faut si aucune option utilisateur n'est renseign�e
			
            mooTransition : 'Bounce',
            mooEase : 'easeOut',
            mooDuree : 500
        },
			
        initialize: function(element,options) {
			
            this.setOptions(options); //enregistre les options utilisateur

            var maduree = this.options.mooDuree;
            var matransition = this.options.mooTransition;
            var monease = this.options.mooEase;

            var els = element.getElements('li');

            els.each(function(el) {
										
                if (el.getElement('div.floatCK') != null) {
                    el.conteneur = el.getElement('div.drop-main');
						
                    el.conteneurul = el.getElements('div.floatCK ul');
                    el.conteneurul.setStyle('position','static');
						
                    el.conteneur.mh = el.conteneur.clientHeight;
                    el.conteneur.mw = el.conteneur.clientWidth;
                    el.duree = maduree;
                    el.transition = matransition;
                    el.ease = monease;
                    $$('div.floatCK').setStyle('left','auto');
                    $$('div.floatCK').setStyle('opacity','0');
                    
                    el.createFxMaxiCK();
                    el.parent = el.getParent().getParent().getParent().getParent();
                    if (el.conteneur.getElement('div.floatCK') != null) this.enfant = el.conteneur.getElement('div.floatCK');
						
                    el.addEvent('mouseover',function() {
							
                        this.showMaxiCK();

                    });
                    el.addEvent('mouseleave',function() {
							
                        this.hideMaxiCK(); //si timeout, probl�me de d�roulement
							
                    });
                }
            });
        }
			
    });
		
    Element.extend({
			
        createFxMaxiCK: function() {
			
            var myTransition = new Fx.Transition(Fx.Transitions[this.transition][this.ease]);
            if (this.hasClass('level0'))
            {
                /*this.maxiFxCK = new Fx.Style(this.conteneur, 'height', {
                    duration:this.duree,
                    transition: myTransition
                });*/
                this.maxiFxCK = new Fx.Slide(this.conteneur);

            } else {
                this.maxiFxCK = new Fx.Style(this.conteneur, 'width', {
                    duration:this.duree,
                    transition: myTransition
                });
            }

            //this.maxiFxCK.set(0);
            this.maxiFxCK.hide();
            //this.conteneur.setStyle('left', '-999em');
				
            animComp = function(){
                if (this.status == 'hide')
                {
                    //this.conteneur.setStyle('left', '-999em');
                    this.hidding = 0;
                    //this.maxiFxCK.hide();
                    $$('div.floatCK').setStyle('opacity','0');
                }
                this.showing = 0;
                //this.conteneur.setStyle('overflow', '');
					
            }
            this.maxiFxCK.addEvent ('onComplete', animComp.bind(this));

        },
			
        showMaxiCK: function() {
            clearTimeout (this.timeout);
            this.status = 'show';
            this.animMaxiCK();
        },
			
        hideMaxiCK: function(timeout) {
            this.status = 'hide';
				
            clearTimeout (this.timeout);
            if (timeout)
            {
                this.timeout = setTimeout (this.anim.bind(this), timeout);
            }else{
                this.animMaxiCK();
            }
        },

        animMaxiCK: function() {

            //if ((this.status == 'hide' && this.conteneur.style.left != 'auto') || (this.status == 'show' && this.conteneur.style.left == 'auto' && !this.hidding) ) return;
					
            //this.conteneur.setStyle('overflow', 'hidden');
            if (this.status == 'show') {
                this.hidding = 0;
            }
            if (this.status == 'hide')
            {
                this.hidding = 1;
                this.showing = 0;
                //this.maxiFxCK.stop();
					
                if (this.hasClass('level0')) {
                   //this.maxiFxCK.start(this.conteneur.offsetHeight,0);
                    this.maxiFxCK.slideOut();
                } else {
                    this.maxiFxCK.start(this.conteneur.offsetWidth,0);
                }

            } else {
                this.showing = 1;
                //this.conteneur.setStyle('left', 'auto');
                //this.maxiFxCK.stop();
                if (this.hasClass('level0')) {
                    //this.maxiFxCK.start(this.conteneur.offsetHeight,this.conteneur.mh);
var test = this.conteneur.getParent().getParent();
                    test.setStyle('opacity','1');
                    this.maxiFxCK.slideIn();
                } else {
                    this.maxiFxCK.start(this.conteneur.offsetWidth,this.conteneur.mw);
                }
            }
				

        }
    });

    DropdownMaxiMenu.implement(new Options); //ajoute les options utilisateur � la class

		
/*Window.onDomReady(function() {new DropdownMenu($E('ul.maximenuCK'),{
                  //mooTransition : 'Quad',
			               //mooTransition : 'Cubic',
			               //mooTransition : 'Quart',
			               //mooTransition : 'Quint',
			               //mooTransition : 'Pow',
			               //mooTransition : 'Expo',
			               //mooTransition : 'Circ',
			               mooTransition : 'Sine',
			               //mooTransition : 'Back',
			               //mooTransition : 'Bounce',
			               //mooTransition : 'Elastic',

			               mooEase : 'easeIn',
                                       //mooEase : 'easeOut',
                                       //mooEase : 'easeInOut',
                                       
                                       mooDuree : 500
                                       })
                                       });*/

}