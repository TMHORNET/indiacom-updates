import{p as ee,_ as c,J as A,K as M,L as oe,r as se,M as te,v as re,b as D,c as q,a as E,N as z,g as W,f as U}from"./identifier-91e83c3b.js";import{r as L,j as x}from"./main.js";import{p as ae,q as ne,c as V,s as T,B as le,r as ce,u as H,T as G}from"./iconBase-acf0401f.js";import{u as J,f as ie}from"./useFormControl-74340145.js";import{r as de}from"./index.esm-d52ea482.js";const ue=ae(),pe=ue,me=["component","direction","spacing","divider","children","className","useFlexGap"],fe=ee(),be=pe("div",{name:"MuiStack",slot:"Root",overridesResolver:(e,o)=>o.root});function he(e){return ne({props:e,name:"MuiStack",defaultTheme:fe})}function ge(e,o){const t=L.Children.toArray(e).filter(Boolean);return t.reduce((r,n,s)=>(r.push(n),s<t.length-1&&r.push(L.cloneElement(o,{key:`separator-${s}`})),r),[])}const ye=e=>({row:"Left","row-reverse":"Right",column:"Top","column-reverse":"Bottom"})[e],Ce=({ownerState:e,theme:o})=>{let t=c({display:"flex",flexDirection:"column"},A({theme:o},M({values:e.direction,breakpoints:o.breakpoints.values}),r=>({flexDirection:r})));if(e.spacing){const r=oe(o),n=Object.keys(o.breakpoints.values).reduce((a,l)=>((typeof e.spacing=="object"&&e.spacing[l]!=null||typeof e.direction=="object"&&e.direction[l]!=null)&&(a[l]=!0),a),{}),s=M({values:e.direction,base:n}),u=M({values:e.spacing,base:n});typeof s=="object"&&Object.keys(s).forEach((a,l,g)=>{if(!s[a]){const C=l>0?s[g[l-1]]:"column";s[a]=C}}),t=se(t,A({theme:o},u,(a,l)=>e.useFlexGap?{gap:z(r,a)}:{"& > :not(style):not(style)":{margin:0},"& > :not(style) ~ :not(style)":{[`margin${ye(l?s[l]:e.direction)}`]:z(r,a)}}))}return t=te(o.breakpoints,t),t};function ke(e={}){const{createStyledComponent:o=be,useThemeProps:t=he,componentName:r="MuiStack"}=e,n=()=>V({root:["root"]},a=>E(r,a),{}),s=o(Ce);return L.forwardRef(function(a,l){const g=t(a),y=re(g),{component:C="div",direction:F="column",spacing:$=0,divider:S,children:i,className:k,useFlexGap:p=!1}=y,R=D(y,me),j={direction:F,spacing:$,useFlexGap:p},P=n();return x.jsx(s,c({as:C,ownerState:j,ref:l,className:q(P.root,k)},R,{children:S?ge(i,S):i}))})}function Pe(e){return E("PrivateSwitchBase",e)}W("PrivateSwitchBase",["root","checked","disabled","input","edgeStart","edgeEnd"]);const ve=["autoFocus","checked","checkedIcon","className","defaultChecked","disabled","disableFocusRipple","edge","icon","id","inputProps","inputRef","name","onBlur","onChange","onFocus","readOnly","required","tabIndex","type","value"],xe=e=>{const{classes:o,checked:t,disabled:r,edge:n}=e,s={root:["root",t&&"checked",r&&"disabled",n&&`edge${U(n)}`],input:["input"]};return V(s,Pe,o)},Fe=T(le)(({ownerState:e})=>c({padding:9,borderRadius:"50%"},e.edge==="start"&&{marginLeft:e.size==="small"?-3:-12},e.edge==="end"&&{marginRight:e.size==="small"?-3:-12})),Se=T("input",{shouldForwardProp:ce})({cursor:"inherit",position:"absolute",opacity:0,width:"100%",height:"100%",top:0,left:0,margin:0,padding:0,zIndex:1}),Re=L.forwardRef(function(o,t){const{autoFocus:r,checked:n,checkedIcon:s,className:u,defaultChecked:h,disabled:a,disableFocusRipple:l=!1,edge:g=!1,icon:y,id:C,inputProps:F,inputRef:$,name:S,onBlur:i,onChange:k,onFocus:p,readOnly:R,required:j=!1,tabIndex:P,type:m,value:B}=o,f=D(o,ve),[v,K]=de({controlled:n,default:!!h,name:"SwitchBase",state:"checked"}),b=J(),Q=d=>{p&&p(d),b&&b.onFocus&&b.onFocus(d)},X=d=>{i&&i(d),b&&b.onBlur&&b.onBlur(d)},Y=d=>{if(d.nativeEvent.defaultPrevented)return;const O=d.target.checked;K(O),k&&k(d,O)};let N=a;b&&typeof N>"u"&&(N=b.disabled);const Z=m==="checkbox"||m==="radio",I=c({},o,{checked:v,disabled:N,disableFocusRipple:l,edge:g}),_=xe(I);return x.jsxs(Fe,c({component:"span",className:q(_.root,u),centerRipple:!0,focusRipple:!l,disabled:N,tabIndex:null,role:void 0,onFocus:Q,onBlur:X,ownerState:I,ref:t},f,{children:[x.jsx(Se,c({autoFocus:r,checked:n,defaultChecked:h,className:_.input,disabled:N,id:Z?C:void 0,name:S,onChange:Y,readOnly:R,ref:$,required:j,ownerState:I,tabIndex:P,type:m},m==="checkbox"&&B===void 0?{}:{value:B},F)),v?s:y]}))}),_e=Re,Be=ke({createStyledComponent:T("div",{name:"MuiStack",slot:"Root",overridesResolver:(e,o)=>o.root}),useThemeProps:e=>H({props:e,name:"MuiStack"})}),Le=Be;function $e(e){return E("MuiFormControlLabel",e)}const je=W("MuiFormControlLabel",["root","labelPlacementStart","labelPlacementTop","labelPlacementBottom","disabled","label","error","required","asterisk"]),w=je,Ne=["checked","className","componentsProps","control","disabled","disableTypography","inputRef","label","labelPlacement","name","onChange","required","slotProps","value"],we=e=>{const{classes:o,disabled:t,labelPlacement:r,error:n,required:s}=e,u={root:["root",t&&"disabled",`labelPlacement${U(r)}`,n&&"error",s&&"required"],label:["label",t&&"disabled"],asterisk:["asterisk",n&&"error"]};return V(u,$e,o)},Te=T("label",{name:"MuiFormControlLabel",slot:"Root",overridesResolver:(e,o)=>{const{ownerState:t}=e;return[{[`& .${w.label}`]:o.label},o.root,o[`labelPlacement${U(t.labelPlacement)}`]]}})(({theme:e,ownerState:o})=>c({display:"inline-flex",alignItems:"center",cursor:"pointer",verticalAlign:"middle",WebkitTapHighlightColor:"transparent",marginLeft:-11,marginRight:16,[`&.${w.disabled}`]:{cursor:"default"}},o.labelPlacement==="start"&&{flexDirection:"row-reverse",marginLeft:16,marginRight:-11},o.labelPlacement==="top"&&{flexDirection:"column-reverse",marginLeft:16},o.labelPlacement==="bottom"&&{flexDirection:"column",marginLeft:16},{[`& .${w.label}`]:{[`&.${w.disabled}`]:{color:(e.vars||e).palette.text.disabled}}})),qe=T("span",{name:"MuiFormControlLabel",slot:"Asterisk",overridesResolver:(e,o)=>o.asterisk})(({theme:e})=>({[`&.${w.error}`]:{color:(e.vars||e).palette.error.main}})),Ie=L.forwardRef(function(o,t){var r,n;const s=H({props:o,name:"MuiFormControlLabel"}),{className:u,componentsProps:h={},control:a,disabled:l,disableTypography:g,label:y,labelPlacement:C="end",required:F,slotProps:$={}}=s,S=D(s,Ne),i=J(),k=(r=l??a.props.disabled)!=null?r:i==null?void 0:i.disabled,p=F??a.props.required,R={disabled:k,required:p};["checked","name","onChange","value","inputRef"].forEach(v=>{typeof a.props[v]>"u"&&typeof s[v]<"u"&&(R[v]=s[v])});const j=ie({props:s,muiFormControl:i,states:["error"]}),P=c({},s,{disabled:k,labelPlacement:C,required:p,error:j.error}),m=we(P),B=(n=$.typography)!=null?n:h.typography;let f=y;return f!=null&&f.type!==G&&!g&&(f=x.jsx(G,c({component:"span"},B,{className:q(m.label,B==null?void 0:B.className),children:f}))),x.jsxs(Te,c({className:q(m.root,u),ownerState:P,ref:t},S,{children:[L.cloneElement(a,R),p?x.jsxs(Le,{display:"block",children:[f,x.jsxs(qe,{ownerState:P,"aria-hidden":!0,className:m.asterisk,children:[" ","*"]})]}):f]}))}),Oe=Ie;export{Oe as F,Le as S,_e as a};
