import{a as d,g as p,_ as a,b as m,c as u}from"./identifier-91e83c3b.js";import{r as g,j as C}from"./main.js";import{s as f,u as x,c as A}from"./iconBase-acf0401f.js";function S(s){return d("MuiCardActions",s)}p("MuiCardActions",["root","spacing"]);const b=["disableSpacing","className"],y=s=>{const{classes:t,disableSpacing:o}=s;return A({root:["root",!o&&"spacing"]},S,t)},R=f("div",{name:"MuiCardActions",slot:"Root",overridesResolver:(s,t)=>{const{ownerState:o}=s;return[t.root,!o.disableSpacing&&t.spacing]}})(({ownerState:s})=>a({display:"flex",alignItems:"center",padding:8},!s.disableSpacing&&{"& > :not(style) ~ :not(style)":{marginLeft:8}})),j=g.forwardRef(function(t,o){const e=x({props:t,name:"MuiCardActions"}),{disableSpacing:r=!1,className:i}=e,c=m(e,b),n=a({},e,{disableSpacing:r}),l=y(n);return C.jsx(R,a({className:u(l.root,i),ownerState:n,ref:o},c))}),_=j;export{_ as C};