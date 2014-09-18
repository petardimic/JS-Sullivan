/* [nodename, id, name, navigationtext, href, isnavigation, childs[], templatename] */

if (typeof(decodeURIComponent) == 'undefined') {
  decodeURIComponent = function(s) {
    return unescape(s);
  }
}

function jdecode(s) {
    s = s.replace(/\+/g, "%20")
    return decodeURIComponent(s);
}

var POS_NODENAME=0;
var POS_ID=1;
var POS_NAME=2;
var POS_NAVIGATIONTEXT=3;
var POS_HREF=4;
var POS_ISNAVIGATION=5;
var POS_CHILDS=6;
var POS_TEMPLATENAME=7;
var POS_TARGET=8;
var theSitetree=[ 
	['PAGE','2701',jdecode('Home'),jdecode(''),'/2701.html','true',[],'','']];
var siteelementCount=1;
theSitetree.topTemplateName='Alpha';
theSitetree.paletteFamily='555454';
theSitetree.keyvisualId='-1';
theSitetree.keyvisualName='keyv.jpg';
theSitetree.fontsetId='10461';
theSitetree.graphicsetId='10892';
theSitetree.contentColor='000000';
theSitetree.contentBGColor='FFFFFF';
var localeDef={
  language: 'en',
  country: 'US'
};
var theTemplate={
				hasFlashNavigation: 'false',
				hasFlashLogo: 	'false',
				hasFlashCompanyname: 'false',
				hasFlashElements: 'false',
				hasCompanyname: 'false',
				name: 			'Alpha',
				paletteFamily: 	'555454',
				keyvisualId: 	'-1',
				keyvisualName: 	'keyv.jpg',
				fontsetId: 		'10461',
				graphicsetId: 	'10892',
				contentColor: 	'000000',
				contentBGColor: 'FFFFFF',
				a_color: 		'000000',
				b_color: 		'000000',
				c_color: 		'000000',
				d_color: 		'555454',
				e_color: 		'555454',
				f_color: 		'555454',
				hasCustomLogo: 	'true',
				contentFontFace:'Arial, Helvetica, sans-serif',
				contentFontSize:'12',
				useFavicon:     'false'
			  };
var webappMappings = {};
webappMappings['5000']=webappMappings['5000-']={
webappId:    '5000',
documentId:  '2701',
internalId:  '',
customField: '20100830-110217'
};
var canonHostname = 'wsc-worker01.chi.us.siteprotect.com';
var accountId     = 'AHW050INZ32P';
var companyName   = 'Under+construction';
var htmlTitle	  = '';
var metaKeywords  = '';
var metaContents  = '';
theSitetree.getById = function(id, ar) {
	if (typeof(ar) == 'undefined'){
		ar = this;
	}
	for (var i=0; i < ar.length; i++) {
		if (ar[i][POS_ID] == id){
			return ar[i];
		}
		if (ar[i][POS_CHILDS].length > 0) {
			var result=this.getById(id, ar[i][POS_CHILDS]);
			if (result != null){
				return result;
			}
		}
	}
	return null;
};

theSitetree.getParentById = function(id, ar) {
	if (typeof(ar) == 'undefined'){
		ar = this;
	}
	for (var i=0; i < ar.length; i++) {
		for (var j = 0; j < ar[i][POS_CHILDS].length; j++) {
			if (ar[i][POS_CHILDS][j][POS_ID] == id) {
				// child found
				return ar[i];
			}
			var result=this.getParentById(id, ar[i][POS_CHILDS]);
			if (result != null){
				return result;
			}
		}
	}
	return null;
};

theSitetree.getName = function(id) {
	var elem = this.getById(id);
	if (elem != null){
		return elem[POS_NAME];
	}
	return null;
};

theSitetree.getNavigationText = function(id) {
	var elem = this.getById(id);
	if (elem != null){
		return elem[POS_NAVIGATIONTEXT];
	}
	return null;
};

theSitetree.getHREF = function(id) {
	var elem = this.getById(id);
	if (elem != null){
		return elem[POS_HREF];
	}
	return null;
};

theSitetree.getIsNavigation = function(id) {
	var elem = this.getById(id);
	if (elem != null){
		return elem[POS_ISNAVIGATION];
	}
	return null;
};

theSitetree.getTemplateName = function(id, lastTemplateName, ar) {
	if (typeof(lastTemplateName) == 'undefined'){
		lastTemplateName = this.topTemplateName;
	}
	if (typeof(ar) == 'undefined'){
		ar = this;
	}
	for (var i=0; i < ar.length; i++) {
		var actTemplateName = ar[i][POS_TEMPLATENAME];
		if (actTemplateName == ''){
			actTemplateName = lastTemplateName;
		}
		if (ar[i][POS_ID] == id) {
			return actTemplateName;
		}
		if (ar[i][POS_CHILDS].length > 0) {
			var result=this.getTemplateName(id, actTemplateName, ar[i][POS_CHILDS]);
			if (result != null){
				return result;
			}
		}
	}
	return null;
};

theSitetree.getByXx = function(lookup, xx, ar) {
    if (typeof(ar) == 'undefined'){
    	ar = this;
    }
    for (var i=0; i < ar.length; i++) {
        if (ar[i][xx] == lookup){
        	return ar[i];
        }
        if (ar[i][POS_CHILDS].length > 0) {
        	var result=this.getByXx(lookup, xx, ar[i][POS_CHILDS]);
            if (result != null){
                return result;
               }
        }
    }
    return null;
};

function gotoPage(lookup) {
	if(__path_prefix__ == "/servlet/CMServeRES" && typeof (changePage) == 'function'){
		changePage(lookup);
		return;
	}
	var page = theSitetree.getHREF(lookup);
	if (!page) {
		var testFor = [ POS_NAME, POS_NAVIGATIONTEXT ];
		for (var i=0 ; i < testFor.length ; i++) {
			var p = theSitetree.getByXx(lookup, testFor[i]);
			if (p != null) {
				page = p[POS_HREF];
				break;
			}
		}
	}
	document.location.href = (new URL(__path_prefix__ + page, true, true)).toString();
};
