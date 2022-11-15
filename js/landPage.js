


// alert(variableGlobal);
 
diHola();
 
// alert(variableGlobal);

//··············UTILS····················
function hexToRgb(color) {


    var result = /^#?([a-f\d]{2})([a-f\d]{2})([a-f\d]{2})$/i.exec(color);
    return result ? {
        r: parseInt(result[1], 16),
        g: parseInt(result[2], 16),
        b: parseInt(result[3], 16)
    } : null;

}
function rgbToHex(color) {
    return "#"+
        ((1<<24)+(color.r<<16)+(color.g<<8)+(color.b)).toString(16).slice(1);
}

function darkenColor(color,cant){

    color = (color.r && color.g && color.b)?color:hexToRgb(color);
    if(color==null) console.error('Color format invalid!');
    color.r = (color.r-cant>0)?color.r-cant:0;
    color.g = (color.g-cant>0)?color.g-cant:0;
    color.b = (color.b-cant>0)?color.b-cant:0;
    
    return rgbToHex(color);
}

function getItemHeight(width){
    return  (width < 425)? 400:
            (width < 728)? 640:
            (width < 1024)? 700:
            (width < 1440)? 800: 
            (width < 1620)? 900: 
            (width < 2048)? 1400:
            (width < 2500)? 2000: 
            2500;    
}



function getScopedScrollArgs(nItem,scroll){

    let dif = 100*nItem;
    let ss = scroll - (getItemHeight(document.body.clientWidth)*nItem) + dif;
        ss = (ss >= 0)?(ss <= document.body.clientHeight)?ss:document.body.clientHeight:0;
    return {
        globalScroll:scroll,
        scroll: ss,
        porc: (ss/document.body.clientHeight)*100,
        height: document.body.clientHeight,
        width : document.body.clientWidth
    }
    console.log(colorff);

}
      // Function is called, return value will end up in x



console.log(colorff);

const itemsBackground = colorff;
//·······································
const urls = [  'img/buzo.png',
                'img/buzo-con-luz.png',
                'img/terra.mp4',
                'img/rov.png',
                'img/rov-luz.png',
                'img/coral.png',
                ];  
const transitions = 
        {
            "none": null,
            "up-in":
                {  properties:['transform','opacity'],
                    comands:['"translateY("+this.values.y+")"','this.values.opacity'],
                    calculate: (args)=>{
                        return {
                            y:(args.scroll<args.height)?args.scroll-args.height+'px':'0px',
                            opacity:(args.scroll/args.height)
                        }
                    }
                },
            
            "in-right":
                {  properties:['transform'],
                    comands:['"translateX("+this.values.x+")"'],
                    calculate: (args)=>{
                        return {
                            x: (100-args.porc)*3+'px'
                        }
                    }
                },
            "fade-in":
                {   properties:['opacity','transition'],
                    comands:['this.values.opacity','this.values.transition'],
                    calculate: (args)=>{
                        return {
                            opacity:(args.scroll>=args.height)?1:0,
                            transition: '.5s'
                        }
                    }
                },
            "in-right-increase":
                {
                    properties:['transform'],
                    comands:['"translateX("+this.values.x+") scale("+this.values.scale+")"'],
                    calculate: (args)=>{
                        let scale = (args.scroll/args.height);
                        return {
                            x: (100-args.porc)*4+'px',
                            scale: (scale>=0.2)?scale:0.2
                        }
                    }
                } 
        };




class Config{
    constructor(){
        this.items = [
            { params:{},
              srcs:[
                {type:'img', url:urls[0], transition:transitions['none'], class:'buzo'}
              ] 
            },
            { params:{},
              srcs:[
                {type:'img', url:urls[1], transition:transitions['blink'], class:'soldador'}
              ] 
            },
            { params:{},
              srcs:[
                {type:'video', url:urls[2], transition:transitions['none'], class:'terra-video'}
              ]
            },
            { params:{},
              srcs:[ {type:'img', url:urls[3], transition:transitions['none'], class:'rov'},
                     {type:'img', url:urls[4], transition:transitions['none'], class:'rov-luz'}
              ]
            },
            { params:{},
              srcs:[
                {type:'img', url:urls[5], transition:transitions['none'], class:'coral'},
                {type:'img', url:urls[6], transition:transitions[''], class:'submarino'}
              ]
            } 
        ];

        this.moduleDefault = [];
    }
}

class Slide{
    constructor(componentRef,time){
        this.$component =  componentRef;
        this.$frame= document.createElement('div');
        this.$img  = document.createElement('img');
        this.$text = document.createElement('span');
        this.$rBtn = document.createElement('i');
        this.$lBtn = document.createElement('i');
        
        let n = this.$component.getAttribute("data-src");
        if(!n) console.error('data-src is not defined');
        this.srcs = config.slides[n];

        this.current = 0;
        this.time = time;
        if(!this.srcs) this.srcs=[];        
        this.init();
    }

    init(){
        this.$frame.classList.add('frame');
        this.$rBtn.classList.add('slide-btn');
        this.$lBtn.classList.add('slide-btn');
        this.$text.classList.add('frame-text');

        this.$component.appendChild(this.$frame);
        this.$frame.appendChild(this.$rBtn);
        this.$frame.appendChild(this.$lBtn);
        this.$frame.appendChild(this.$text);

        let a = document.createElement('a');
        a.appendChild(this.$img);
        this.$frame.appendChild(a);

        this.$rBtn.setAttribute('data-dir','right');
        this.$rBtn.classList.add('fa');
        this.$rBtn.classList.add('fa-angle-right');
        this.$rBtn.addEventListener('click',event=>this.changeSrc(event,1));

        this.$lBtn.setAttribute('data-dir','left');
        this.$lBtn.classList.add('fa');
        this.$lBtn.classList.add('fa-angle-left');
        this.$lBtn.addEventListener('click',event=>this.changeSrc(event,-1));
        this.updateSrc();

        console.log(this.time);
        var timer = setInterval(()=>{
            console.log('*');
            this.changeSrc(null,1);
        },this.time);
    }

    changeSrc(event,dir){
        if(event) event.preventDefault();
        this.current += dir;
        this.current = (this.current < 0)?this.srcs.length-1:(this.current>this.srcs.length-1)?0:this.current;
        this.$frame.classList.add('changing');
        setTimeout(()=>{
            this.updateSrc();
        },200);
    }

    updateSrc(){
        this.$frame.classList.remove('changing');
        if(this.srcs && this.srcs[this.current] && this.srcs[this.current].img && this.srcs[this.current].text){
            this.$img.src = this.srcs[this.current].img;
            this.$img.alt = ' ';
            this.$text.textContent = this.srcs[this.current].text;
        }
    }
}

class Transition{
    constructor(params,targetElement){
        this.properties = params.properties;
        this.values = {};
        this.comands = params.comands;
        this.calculate = params.calculate;
        this.target = targetElement;
        this.update(0);
    }
    update(nItem,scroll){
        if(this.calculate){
            this.values = this.calculate(getScopedScrollArgs(nItem,scroll));
            this.properties.forEach((property,i)=>{
                this.target.style.setProperty(property,eval(this.comands[i]));
            });
        }
    }
}

class Src{
    constructor(srcModel,contentElement){
        this.type =srcModel.type;
        this.class=srcModel.class;
        this.url=srcModel.url;
        this.elementRef = document.createElement(srcModel.type);
        this.initElement(contentElement);
        if(srcModel.transition)
            this.transition = new Transition(srcModel.transition,this.elementRef);
    }

    initElement(contentElement){
        if(this.type=='img'){
            this.elementRef.setAttribute('src',this.url);
        }
        else if(this.type=='video'){
            this.elementRef.playsinline = true;
            this.elementRef.autoplay = true;
            this.elementRef.muted = true;
            this.elementRef.loop = true;
            this.elementRef.id = 'proyect_video';
            this.elementRef.innerHTML = '<source src="'+this.url+'" type="video/mp4">';
            contentElement.classList.add('blend');
        }
        this.elementRef.classList.add(this.type);
        if(this.class)
            this.elementRef.classList.add(this.class);
        contentElement.appendChild(this.elementRef);
    }

    update(nItem,scroll){
        if(this.transition)
            this.transition.update(nItem,scroll);
    }
}

class Item{
    constructor(model,parentElement){
        this.elementRef=null;
        this.title = model.params.title;
        this.content = model.params.content;
        this.link = model.params.link;
        this.order = model.params.order;
        this.srcs = [];
        this.constructDOM(parentElement);
        this.initSrcs(model.srcs);
        this.elementRef.classList.add(this.srcs[0].class);
        this.update();
    }

    update(scroll){
        this.elementRef.style.setProperty('height',getItemHeight(document.body.clientWidth)+'px');
        this.srcs.forEach(src=>src.update(this.order,scroll));
    }

    constructDOM(parentElement){
        this.elementRef = document.createElement('div');
        this.elementRef.id='item_'+this.order;
        this.elementRef.classList.add('item');
        this.elementRef.style.background = darkenColor(itemsBackground,25*this.order);
        this.elementRef.innerHTML = this.getItemContent();
        parentElement.appendChild(this.elementRef);
    }

    initSrcs(srcs){
        let $srcsElemt = this.elementRef.querySelector('.srcs');
        srcs.forEach((src,i)=>{
            this.srcs[i] = new Src(src, $srcsElemt);
        });
    }

    getItemContent(){
       return '<article>' 
                    +'<div class="item-content"> <h2 class="title">'+this.title+'</h2><p>'+this.content+'</p> </div>' 
                    +'<a href="'+this.link+'" class="btn-module"> Ver </a>' 
             +'</article>'
             +'<div class="srcs"></div>'
    }
}

class LandPage{
    constructor(config){
        this.$header = document.querySelector('header');
        this.$itemsContainer = document.querySelector('#items');
        this.$footer = document.querySelector('footer');
        this.items = [];
        this.slides = [];
        this.initItems(config);
        this.initDefaultModule(config.moduleDefault);
    }

    initItems(config){
        config.items.forEach((item,i)=>{
            this.items[i] = new Item(item,this.$itemsContainer);
            if(this.items[i].elementRef.classList.contains('soldador')){
                let img = document.createElement('img');
                let div = document.createElement('div');
                
                img.classList.add('pipe');
                this.$itemsContainer.appendChild(div);
            }
        });
        this.initSlides();
        this.initMenu(config);
        this.initVisualEvents();
    }

    initSlides(){
        let s = document.querySelectorAll('.slide');
        s.forEach(($slide)=>{
            this.slides.push(new Slide($slide,3000));
        });

    }

    initVisualEvents(){
        this.$header.addEventListener('mousemove',(e)=>{
            this.$header.style.setProperty('background-position',(100*e.clientX/this.$header.clientWidth)+'%'+' center');
        });
        window.addEventListener('resize',(e)=>{
            this.items.forEach(item=>item.update());
        });

        console.log(BrowserDetect.browser);
        if(BrowserDetect.browser == 'Chrome' || BrowserDetect.browser == 'Opera'){
            document.addEventListener('scroll',(e)=>{
                this.items.forEach(item=>item.update(document.body.scrollTop));
            });
        }
        else if(BrowserDetect.browser == 'Firefox'){
            console.log({document:document});
            document.onscroll = (e)=>{
                this.items.forEach(item=>item.update(e.pageY));
            };
        }
    }

    initMenu(config){
        let menu = document.querySelector('#menu-items');
        let inicio = document.createElement('a'); 
        inicio.classList.add('nav-link');
        inicio.textContent = 'inicio';
        inicio.href = '#index';
        inicio.addEventListener('click',()=>{
            this.toggleMenu('hidden');
        });
        menu.appendChild(inicio);

        config.items.forEach((item,i)=>{
            let a = document.createElement('a');
            a.classList.add('nav-link');
            a.textContent = item.params.title;
            a.href = '#'+this.items[i].elementRef.id;
            a.addEventListener('click',()=>{
                this.toggleMenu('hidden');
            });
            menu.appendChild(a);
        });
    }

    initDefaultModule(module){
        let $module = document.querySelector('#module-default');
        module.forEach((sub,i)=>{
            let figure = document.createElement('figure');
            figure.classList.add('circle-item');
            figure.innerHTML =  '<img src="'+sub.img+'">'+
                                '<figcaption><i class="fa '+sub.icon+'"></i></figcaption>'+
                                '<a href="'+sub.link+'"></a>'+
                                '<span class="title">'+sub.title+'</span>';
            $module.appendChild(figure);
        });
    }

    toggleMenu(state){
        if(!state)
            document.querySelector('#menu').classList.toggle('hidden');
        else if(state == 'hidden')
            document.querySelector('#menu').classList.add('hidden');
        else if(state == 'show')
            document.querySelector('#menu').classList.remove('hidden');
    }
}
