//�Լ�д��
$(".onlinecontr").hide();
$(".onlinecollspase").show();
$(".onlinecollspase .zk").click(function(){
		$(".onlinecontr").show();
		$(".onlinecollspase").hide();	
	})
$(".onlinecontr .gb").click(function(){
		$(".onlinecontr").hide();
		$(".onlinecollspase").show();		
	})

//������ʼ
gID("KeFuDiv").style.top = 0+"px";

//��ʼ����
ScrollDiv('KeFuDiv');

var isIE = /msie/i.test(navigator.userAgent);

function gID(id){return document.getElementById(id);}

//Ư��
//��������ID����¼�ϴι���λ�ã�Ĭ�Ͽ���Ϊ�գ��ݹ�ʹ�ã�
function ScrollDiv(id,pScrollY){ 
	//var ScrollY = document.documentElement.scrollTop ? document.documentElement.scrollTop : document.body.scrollTop;
	var ScrollY = document.documentElement.scrollTop || document.body.scrollTop; //���ݴ���
	if (pScrollY ==null) { pScrollY=0; }

	var moveTop = .1 * (ScrollY - pScrollY); //�ɵ����ƶ��ٶ�
	moveTop = (moveTop > 0) ? Math.ceil(moveTop) : Math.floor(moveTop);
	gID(id).style.top = parseInt(gID(id).style.top) + moveTop + "px";

	pScrollY = pScrollY + moveTop; 
	setTimeout("ScrollDiv('"+id+"',"+pScrollY+");",10); //�ɵ���������ķ�ӳ�ٶ�
}


//�����¼�����������ͻԭ�����¼�
//�����������¼����ƣ���on�����¼����壨���Ҫ����������Ҫfunction(){eventFunc("")}�������ݲ�����
function addObjEvent(obj,eventName,eventFunc){
	if (obj.attachEvent){ //IE
		obj.attachEvent(eventName,eventFunc);
	}else if (obj.addEventListener){ //FF Gecko / W3C
		var eventName2 = eventName.toString().replace(/on(.*)/i,'$1'); //������˵�1��on
		obj.addEventListener(eventName2,eventFunc, false); //fslseΪ����ִ���¼�
	}else{
		obj[eventName] = eventFunc;
	}
}


//�Ƴ��¼�����
//�����������¼����ƣ���on�����¼����壨���Ҫ����������Ҫfunction(){eventFunc("")}�������ݲ�����
function delObjEvent(obj,eventName,eventFunc){
	if (obj.detachEvent) { // IE
		obj.detachEvent(eventName,eventFunc);
	}else if (obj.removeEventListener){ //FF Gecko / W3C
		var eventName2 = eventName.toString().replace(/on(.*)/i,'$1'); //������˵�1��on
		obj.removeEventListener(eventName2,eventFunc, false); //fslseΪ����ִ���¼�
	}else{
		obj[eventName] = null;
	}
}


//���������϶��Ĳ㣨֧��Firefox,IE)
//�������ƶ��Ĳ�����event���󣬷��� onmousedown="MoveDiv(this,event)"
function MoveDiv(obj,e){
	e = e||window.event;

	var ie6=isIE;
	if (/msie 9/i.test(navigator.userAgent)) {ie6=false;} //��IE9����Ϊ��IE�����
	//ֻ����ͨ��������������ק,IE68������Ϊ1 FireFox ie9����Ϊ0
	if (ie6 && e.button == 1 || !ie6 && e.button == 0) {}else{return false;}

	obj.style.position='absolute'; //���ø���ģʽ
	obj.ondragstart =function(){return false;} //��ֹ������϶��¼�����ȻͼƬ�ڻ���»��޷��϶�

	var x = e.screenX - obj.offsetLeft;
	var y = e.screenY - obj.offsetTop;
	addObjEvent(document,'onmousemove',moving); //����ƶ�ʱ�������ƶ��¼�
	addObjEvent(document,'onmouseup',endMov); //���ſ�ʱ������ֹͣ�¼�
	e.cancelBubble = true; //��ֹ�¼�ð��,ʹ�������Ӷ����ϵ��¼������ݸ�������
	
	//IEȥ��ѡ�б�������
	if (isIE) {
		obj.setCapture(); //���ò���Χ releaseCapture() �ͷ�
	} else {
		window.captureEvents(Event.mousemove); //window.releaseEvents(Event.eventType) �ͷ�
	}

	//if (!isIE){e.stopPropagation();} //W3C ��ֹð��
	//FireFox ȥ����������קͼƬ���⣬�����ֹѡ�б�������
	if (e.preventDefault) {
		e.preventDefault(); //ȡ���¼���Ĭ�϶���
		e.stopPropagation(); //�¼����ٱ����ɵ������ڵ�
	}
	e.returnValue = false; //ָ�¼��ķ���ֵ��false ��return false;��ָ�����ķ���ֵΪfalse
	return false;

	//�ƶ�
	function moving(e){
		obj.style.left = (e.screenX - x) + 'px';
		obj.style.top = (e.screenY - y) + 'px';
		return false; //ͼƬ�ƶ�ʱ������϶�ͼƬ�Ķ������������return���Բ�ִ���������
	}
		
	//ֹͣ
	function endMov(e){
		delObjEvent(document,'onmousemove',moving); //ɾ������ƶ��¼�
		delObjEvent(document,'onmouseup',arguments.callee); //ɾ�����ſ��¼�,arguments.calleeΪ��������
		if (isIE) {
			obj.releaseCapture(); //�ͷŲ���
		} else {
			window.releaseEvents(Event.mousemove); //�ͷ�
		}
	}
}