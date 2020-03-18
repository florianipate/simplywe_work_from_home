// JavaScript Document


function Forms() {}


Forms.prototype.Clean = function (oField, sType) {
	
	var regexp;

	switch (sType) {
		
		case 'currency':
		
			regexp = new RegExp(/[^0-9\.]/g);
			oField.value = oField.value.replace(regexp, '');
			
			regexp = new RegExp(/\.[0-9]$/);
			
			if (regexp.test(oField.value)) {
			
				oField.value = oField.value + '0';
			
			}
			
			regexp = new RegExp(/\.$/);
			
			if (regexp.test(oField.value)) {
			
				oField.value = oField.value + '00';
			
			}
			

			var iDecimalIndex = oField.value.indexOf('.');

			if (iDecimalIndex > -1) {
				
				if (iDecimalIndex+3 < oField.value.length) {
			
					oField.value = oField.value.substr(0,iDecimalIndex+3);
				
				} else if (iDecimalIndex == oField.value.length) {
				
					oField.value += '00';
				
				}
			
			}
			
			
			//  regexp = new RegExp(/^[0-9]+(\.[0-9]{2})?$/);
			
		break;
	
		case 'decimal':
		case 'float':
		
			regexp = new RegExp(/[^0-9\.]/g);
			oField.value = oField.value.replace(regexp, '');
		
			oField.value = parseInt(oField.value);
			
		break;
	
		case 'int':
		
			if (oField.value == '') {
				return;
			}
			
			//  Regexp to remove non-number and two numbers at the end, such as ".00" or ",00"
			regexp = new RegExp(/[^\d]\d{2}$/);
			
			//  Do removal
			oField.value = oField.value.replace(regexp, '');
			
		
			//  Set regexp to anything that isn't a number or decimal point
			regexp = new RegExp(/[^0-9\.]/g);
			
			//  Remove them
			oField.value = oField.value.replace(regexp, '');
			
			
			//  If there's a proper decimal point, round it
			if (oField.value.indexOf('.') > -1) {
				
				oField.value = Math.round(parseFloat(oField.value));

			} else {
			
				oField.value = parseInt(oField.value);
			
			}
			
		break;
	
	}

}





Forms.prototype.Validate = function (f, aFields) {
	
	/*
		aFields:
		0 = Display name
		1 = Required
		2 = Format type
	*/

	var l = f.length;		//  form length (number of fields)
	var r = new Array();		//  array to store names of radio buttons already done
	var c, g, i, e, regexp, v;
	
	this.error_msg = '';
	this.num_errors = 0;
	
	for (sFieldId in aFields) {
		
		e = document.getElementById(sFieldId);		//  reference form element
		
		if (!e) {
			continue;
		}
		
	
		v = true;					//	field is valid &#8211; assume it is
		
		//  Split into type to make it easier to manage
		switch (e.type) {
			
			case 'checkbox':
				
				//  If required and not checked...
				if ((aFields[sFieldId][1] == 1) && (!e.checked)) {
					this.ValidationError(e, aFields[sFieldId], 'not checked');
				}
				
			break;
			
			case 'radio':
				
				if (aFields[sFieldId][1] == 1) {
				
					//  If we've not already done it
					if (r[e.name] == 'undefined' || r[e.name] == null) {
						
						r[e.name] = 1;			//  Record we've done it
						g = eval('f.' + e.name);	//  Group of radio buttons
						v = false;			//  Whether anything's been checked
						
						//  Loop group
						for (i = 0; i < g.length; i++) {
							if (g[i].checked) {
								v = true;
								break;
							}
						}
						
						if (!v) {
							this.ValidationError(e, aFields[sFieldId], 'not selected');
						}
							
					}
					
				}
				
			break;
		
			case 'select':
			case 'select-one':
				
				if (aFields[sFieldId][2] == 'notzero') {

					if (e.options[e.selectedIndex].value == '0') {
						this.ValidationError(e, aFields[sFieldId], 'not selected');
					}		
				
				} else {
				
					if ((aFields[sFieldId][1] == 1) && (e.options[e.selectedIndex].value == '')) {
						this.ValidationError(e, aFields[sFieldId], 'not selected');
					}
					
				}
				
			break;
		
			default:
				
				if (e.value == '' && aFields[sFieldId][1] == 1) {
					this.ValidationError(e, aFields[sFieldId], 'not entered');
				} else {

					v = true;

					switch (aFields[sFieldId][2]) {

						case 'email':

							if (e.value != '') {
								//  Make lowercase
								e.value = e.value.toLowerCase();

								//  Test format
								regexp = new RegExp(/^([a-z0-9_\.\-])+\@(([a-z0-9\-])+\.)+([a-z0-9]{2,4})+$/);
								v = regexp.test(e.value);
							}

						break;

						case 'houseprice':
						case 'house_price':
						case 'propertyvalue':
						case 'property_value':

							if (e.value != '') {
								//  Remove non-numbers and keep decimal point(s)
								regexp = new RegExp(/[^\d\.]/g);
								e.value = e.value.replace(regexp, '');

								//  Check format
								regexp = new RegExp(/^\d{5,8}(\.\d{2})?$/);
								v = regexp.test(e.value);
							}

						break;

						case 'postcode':
						
							if (e.value != '') {
								//  Test postcode
								regexp = new RegExp("^(([EW]C[1-9]|(E|S?W)1)[A-Z]|(A[BL]|B[ABDHLNRST]?|C[ABFHMORTVW]|D[ADEGHLNTY]|E[HNX]?|F[KY]|G[LUY]?|H[ADGPRSUX]|I[GMPV]|[JZ]E|K[ATWY]|L[ADELNSU]?|M[EKL]?|N[EGNPRW]?|O[LX]|P[AEHLOR]|R[GHM]|S[AEGK-PRSTWY]?|T[ADFNQRSW]|UB|W[ADFNRSV]?|YO)[0-9]{1,2}) ?[0-9][ABD-HJLNP-UW-Z]{2}|BFPO ?[1-9][0-9]{0,3}$","i");
								v = regexp.test(e.value);
							}

						break;

						case 'telephone':

							if (e.value != '') {
								//  Remove non-numbers
								regexp = new RegExp(/[^\d]/g);
								e.value = e.value.replace(regexp, '');

								//  Test number
								regexp = new RegExp(/^0(1|2|3|5|7|8)\d{8,9}$/);
								v = regexp.test(e.value);
							}

						break;

						default:
							//  Assume valid
					}

					if (!v) {
						this.ValidationError(e, aFields[sFieldId], 'not valid');
					}

				}

		
		}
		
	}
	
	
	if (this.num_errors > 0) {
		alert('We are sorry, but please could you correct the following\nerrors in order to help us provide a more efficient service?\n' + this.error_msg);
	}
	
	
	return (this.num_errors == 0) ? true : false;

}



Forms.prototype.ValidationError = function (oField, aConfig, sError) {
	
	this.num_errors++;
	
	switch (oField.type) {
		case 'checkbox':
			this.error_msg += '\n &#8211; ' + aConfig[0] + ' ' + sError;
		break;
		
		case 'radio':		
		case 'select':
		case 'select-one':
			this.error_msg += '\n &#8211; ' + aConfig[0] + ' ' + sError;
		break;
		
		default:
			this.error_msg += '\n &#8211; ' + aConfig[0] + ' ' + sError;
	}
	
}



var F = new Forms();