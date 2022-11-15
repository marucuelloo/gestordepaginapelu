
const modules = 
  [{
    title:'Modulo 1',
    background:'http://bh.co.ve/Images/module/image_1490016664f4pWSJqbmHMtNzO4.jpg',
    subs: 
      [ {title:'SubModulo 1',img:'http://bh.co.ve/Images/service/image_14900174983wdAhl0wdcja7rwB.jpg',icon:'fa-buceo-c',link:'#',content:'contenido'},
        {title:'SubModulo 2',img:'http://bh.co.ve/Images/service/image_1490017449PVDxLXwAlTX0Z2Lo.jpg',icon:'fa-buceo',link:'#',content:'contenido'},
        {title:'SubModulo 3',img:'http://bh.co.ve/Images/service/image_1490023645WJCqPZ1uPMT8PVA7.jpg',icon:'fa-capacitacion',link:'#',content:'contenido'},
        {title:'SubModulo 4',img:'http://bh.co.ve/Images/service/image_1490017394RmXzhYl3OrwBAXQf.jpg',icon:'fa-equipo',link:'#',content:'contenido'}]
  },
  {
    title:'Modulo 2',
    background:'http://bh.co.ve/Images/module/image_1490016664f4pWSJqbmHMtNzO4.jpg',
    subs: 
      [ {title:'SubModulo 1',img:'http://bh.co.ve/Images/service/image_14900174983wdAhl0wdcja7rwB.jpg',icon:'fa-buceo-c',link:'#',content:'contenido'},
        {title:'SubModulo 2',img:'http://bh.co.ve/Images/service/image_1490017449PVDxLXwAlTX0Z2Lo.jpg',icon:'fa-buceo',link:'#',content:'contenido'},
        {title:'SubModulo 3',img:'http://bh.co.ve/Images/service/image_1490023645WJCqPZ1uPMT8PVA7.jpg',icon:'fa-capacitacion',link:'#',content:'contenido'},
        {title:'SubModulo 4',img:'http://bh.co.ve/Images/service/image_1490017394RmXzhYl3OrwBAXQf.jpg',icon:'fa-equipo',link:'#',content:'contenido'}]
  }
  ];


class Module{
  constructor(params){
    this.title = params.title;
    this.background = params.background;
    this.subs = params.subs;
    this.initModule();
    this.initSubs();
    this.gal = params.gal;
  }

  initModule(){
    this.$background = document.querySelector('#background');
    this.$background.style.backgroundImage = 'url('+this.background+')';

    let $backdrop = document.querySelector('#modal-view .backdrop');
    $backdrop.addEventListener('click',()=>{
        hideModal();
    });
  }

  initSubs(){
    let contentSubs = document.querySelector('#subs');
    this.subs.forEach(sub=>{
      let $sub = document.createElement('figure');
      $sub.classList.add('article-circle');
      $sub.innerHTML = 
                '<img src="'+sub.img+'" alt="'+sub.title+'">'+
                '<a href="#" class="trigger"></a>'+
                '<figcaption><i class="fa '+sub.icon+'"></i>'+
                    '<div class="context"><h1 class="title">'+sub.title+'</h1></div>'+
                '</figcaption>';
      $sub.addEventListener('click',()=>{
        this.selectSub(sub);
      });
      contentSubs.appendChild($sub);
    });
  }

  selectSub(params){
    let title = document.querySelector('#modal-title');
    let content = document.querySelector('#modal-content');

    this.gal.selectSrc = params.title;
    console.log('select: ',params.title);
    console.log(this.gal.srcs);
    this.gal.currentImg = 0;
    this.gal.updateSrc();

    if(this.gal.srcs[this.gal.selectSrc]){
      if(this.gal.srcs[this.gal.selectSrc].length <= 1){
        console.log('1');
        this.gal.$rBtn.style.setProperty("display",'none', "important");
        this.gal.$lBtn.style.setProperty("display",'none', "important");
      }
    }
    else{
        console.log('2');
        this.gal.$rBtn.style.setProperty("display",'none', "important");
        this.gal.$lBtn.style.setProperty("display",'none', "important");
    }

    title.textContent = params.title;
    content.textContent = params.content;

    showModal();

  }
}



function showModal(){
    let modal = document.querySelector('#modal-view');
    modal.classList.remove('hide');
    setTimeout(()=>{
      modal.classList.add('show');
    },500);

  }

function hideModal(){
    let modal = document.querySelector('#modal-view');
    modal.classList.remove('show');
    setTimeout(()=>{
      modal.classList.add('hide');
    },500);

  }

function toggleNav(){
    document.querySelector('#content-nav').classList.toggle('hidden');
  }


class Slide{
    constructor(componentRef,time,srcs){
        this.$component =  componentRef;
        this.$frame= document.createElement('div');
        this.$img  = document.createElement('img');
        this.$text = document.createElement('span');
        this.$rBtn = document.createElement('i');
        this.$lBtn = document.createElement('i');

        this.srcs = srcs;
        this.currentImg = 0;
        this.selectSrc = '';

        this.time = time;

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
        var timer = setInterval(()=>{
            console.log('*');
            this.changeSrc(null,1);
        },this.time);
    }

    changeSrc(event,dir){
        if(event) event.preventDefault();
        this.currentImg += dir;
        if(this.srcs[this.selectSrc])
          this.currentImg = (this.currentImg < 0)?this.srcs[this.selectSrc].length-1:(this.currentImg>this.srcs[this.selectSrc].length-1)?0:this.currentImg;
        this.$frame.classList.add('changing');
        setTimeout(()=>{
            this.updateSrc();
        },200);
    }

    updateSrc(){
        this.$frame.classList.remove('changing');
        if(this.srcs && this.srcs[this.selectSrc] && this.srcs[this.selectSrc][this.currentImg]){
            this.$img.src = this.srcs[this.selectSrc][this.currentImg];
        }
    }
}