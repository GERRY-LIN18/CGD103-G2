<template>

	<div class="mulstyles">
		<div class="mulstyle_cover">
			<div :class="['cover_pic', { main:currentPic === coverPic}]" v-for="(coverPic,index) of coverPics" :key="index" @click="currentPic = coverPic">
				<img :src="coverPic.src">
				<h2>{{coverPic.text}}</h2>
				<router-link :to="`./Set/${coverPic.link}`"><Button class="cover_btn btn_ns" content="查看更多"></Button></router-link>
				
			</div>
		</div>
		<!-- <Button content="查看更多"></Button> -->
	
		<div class="textLoop_animate">
			<div class="logo_texts" >
				{{logoText}}{{logoText}}{{logoText}}{{logoText}}
			</div>
			<div class="logo_texts" >
				{{logoText}}{{logoText}}{{logoText}}{{logoText}}
				
			</div>
			<div class="logo_texts" >
				{{logoText}}{{logoText}}{{logoText}}{{logoText}}
			</div>
		</div>
		<div class="mulstyle_list">
			<div class="style_pic" v-for="stylePic of stylePics" :key="stylePic">
				<img :src="stylePic.src">
			</div>
		</div>
			
		<ul class="outfit_title">
			<h2>穿搭情境</h2>
			<li :class="['outfit_item', { active: currentTag === tag }]" v-for="(tag,index) of tags" :key="index" @click="currentTag = tag">
				{{tag}}
			</li>
		</ul>
		<div class="container" >
			<div class="row row-cols-2 row-cols-md-2 row-cols-xl-4">
				<div class="col" v-for="(img,index) of showimgs" :key="index">
					<img :src="img.src">
				</div>
			</div>
		</div>

		<div class="textLoop_animate">
			<div class="logo_texts" >
				{{logoText}}{{logoText}}{{logoText}}{{logoText}}
			</div>
			<div class="logo_texts" >
				{{logoText}}{{logoText}}{{logoText}}{{logoText}}
				
			</div>
			<div class="logo_texts" >
				{{logoText}}{{logoText}}{{logoText}}{{logoText}}
			</div>
		</div>
		 

		<div class="kol_stylist">
			<div class="kol_pic">
				<img src="../../../public/pic/stylist-kol.jpg" alt="">
				<h3>Josh Dion</h3>
				<p>擅長時尚風格,用前衛的單品,搭配出衝突的美感</p>
			</div>
			<div class="kol_look">
				<div class="kol_look_pic" v-for="kolPic of kolPics" :key="kolPic">
					<img :src="kolPic.src" alt="">
				</div>
			</div>
		</div>
		
		<div class="stylist_title">
			<h2>精選造型師</h2>
		</div>
		<StylistLook class="stylistLook" scardP="./pic/stylist-1.jpg" stylistName="Kevin" stylistInfo="擅長時尚風格,用前衛的單品,搭配出衝突的美感"></StylistLook>

		<StylistLook scardP="./pic/stylist-2.jpg" stylistName="Molly" stylistInfo="擅長極簡風格,用簡單的單品,搭配出不一樣的風格"></StylistLook>
	</div>
	
</template>

<script>
import StylistLook from "@/components/StylistLook.vue"; 
import Button from "@/components/Button.vue"; 
import { gsap } from "gsap";

export default {
	name: "MulStyle",

	components: {
		StylistLook,
		Button,
		gsap,
	},
	
  	data() {
    	return {
			logoText:'RE:Outfit  ',
			links:[901,902,903,904,905,906],
		
			coverPics:[
				{src:'./look/cover_img1.jpg',text:'登山Outdoor風',link:901},
				{src:'./look/cover_img2.jpg',text:'居家健身風',link:902},
				{src:'./look/cover_img3.jpg',text:'都會Outdoor風',link:903},
				{src:'./look/cover_img4.jpg',text:'戶外Outdoor風',link:904},
				{src:'./look/cover_img5.jpg',text:'輕盈運動風',link:905},
				{src:'./look/cover_img9.jpg',text:'都會休閒風',link:906},
			],
			stylePics:[
				{src:'./pic/mulstyle-1.jpg'},
				{src:'./pic/mulstyle-2.jpg'},
				{src:'./pic/mulstyle-3.jpg'},
				{src:'./pic/mulstyle-4.jpg'},
				{src:'./pic/mulstyle-9.jpg'},
				{src:'./pic/mulstyle-7.jpg'},
			],

			imgs:[
				[{src:'./look/look-1.jpg'},
				{src:'./look/look-2.jpg'},
				{src:'./look/look-3.jpg'},
				{src:'./look/look-4.jpg'},
				{src:'./look/look-5.jpg'},
				{src:'./look/look-6.jpg'},
				{src:'./look/look-7.jpg'},
				{src:'./look/look-8.jpg'}],

				[{src:'./look/look-9.jpg'},
				{src:'./look/look-10.jpg'},
				{src:'./look/look-11.jpg'},
				{src:'./look/look-1.jpg'},
				{src:'./look/look-2.jpg'},
				{src:'./look/look-3.jpg'},
				{src:'./look/look-4.jpg'},
				{src:'./look/look-5.jpg'}],

				[{src:'./look/look-6.jpg'},
				{src:'./look/look-7.jpg'},
				{src:'./look/look-8.jpg'},
				{src:'./look/look-9.jpg'},
				{src:'./look/look-10.jpg'},
				{src:'./look/look-11.jpg'},
				{src:'./look/look-1.jpg'},
				{src:'./look/look-2.jpg'}],

				[{src:'./look/look-4.jpg'},
				{src:'./look/look-6.jpg'},
				{src:'./look/look-2.jpg'},
				{src:'./look/look-5.jpg'},
				{src:'./look/look-8.jpg'},
				{src:'./look/look-1.jpg'},
				{src:'./look/look-9.jpg'},
				{src:'./look/look-11.jpg'}],

				[{src:'./look/look-10.jpg'},
				{src:'./look/look-1.jpg'},
				{src:'./look/look-3.jpg'},
				{src:'./look/look-5.jpg'},
				{src:'./look/look-7.jpg'},
				{src:'./look/look-9.jpg'},
				{src:'./look/look-8.jpg'},
				{src:'./look/look-4.jpg'}],

				[{src:'./look/look-2.jpg'},
				{src:'./look/look-4.jpg'},
				{src:'./look/look-6.jpg'},
				{src:'./look/look-8.jpg'},
				{src:'./look/look-10.jpg'},
				{src:'./look/look-11.jpg'},
				{src:'./look/look-1.jpg'},
				{src:'./look/look-3.jpg'}],

				[{src:'./look/look-7.jpg'},
				{src:'./look/look-5.jpg'},
				{src:'./look/look-6.jpg'},
				{src:'./look/look-4.jpg'},
				{src:'./look/look-8.jpg'},
				{src:'./look/look-1.jpg'},
				{src:'./look/look-3.jpg'},
				{src:'./look/look-10.jpg'}],

				[{src:'./look/look-8.jpg'},
				{src:'./look/look-9.jpg'},
				{src:'./look/look-10.jpg'},
				{src:'./look/look-11.jpg'},
				{src:'./look/look-7.jpg'},
				{src:'./look/look-6.jpg'},
				{src:'./look/look-1.jpg'},
				{src:'./look/look-2.jpg'}],

				[{src:'./look/look-9.jpg'},
				{src:'./look/look-8.jpg'},
				{src:'./look/look-7.jpg'},
				{src:'./look/look-6.jpg'},
				{src:'./look/look-5.jpg'},
				{src:'./look/look-4.jpg'},
				{src:'./look/look-3.jpg'},
				{src:'./look/look-2.jpg'}],
			],
			// showimgs:[{src:'./look-1.jpg'},
			// 	{src:'./look-1.jpg'},
			// 	{src:'./look-1.jpg'},
			// 	{src:'./look-1.jpg'},
			// 	{src:'./look-1.jpg'},
			// 	{src:'./look-1.jpg'},
			// 	{src:'./look-1.jpg'},
			// 	{src:'./look-1.jpg'},]
			// ,
			tags:[
				'#上班穿搭',
				'#開會穿搭',
				'#海邊穿搭',
				'#約會穿搭',
				'#旅行穿搭',
				'#面試穿搭',
				'#上課穿搭',
				'#趴踢穿搭',
				'#宴會穿搭',
			],
			currentTag:'#上班穿搭',
			currentPic: [{src:'./look/cover_img2.jpg'}],
			kolPics:[
				{src:'./pic/stylelist-look1.webp'},
				{src:'./pic/stylelist-look2.webp'},
				{src:'./pic/stylelist-look3.webp'},
				{src:'./pic/stylelist-look4.webp'},
			],
    	} 
  	},
	mounted () {
		this.currentPic=this.coverPics[0] 
	},

	computed: {
		showimgs() {
			const index = this.tags.indexOf(this.currentTag);
			if (index > -1) {
				return this.imgs[index];
			}
			return this.imgs[0];
			// return this.imgs.filter(item => item.cat === this.currentTag)
		},
		
	},
	methods:{
		tagtest(index){
			this.showimgs=this.imgs[index];
		},
		
	}
	

};
</script>
<style lang="scss" scoped>
	@import "@/assets/sass/main";
	@import "@/assets/sass/grid";


	button{
		cursor: pointer;
	}
	.cover_btn{
		position:absolute;
		bottom: 20px;
		left: 0;
		right: 0;
		margin: auto;
		// display:none;
		line-height: 18px;
		
		opacity: 0;
	}
	.mulstyle_cover{
		display: flex;
		width: 100%;
		// max-width: 390px;
		margin:20px auto;
		height: 500px;
		cursor: pointer;
		

		@include xl{
			max-width: 1200px;
		}
		
		.cover_pic{
			overflow: hidden;
			width: 0;
			flex-grow: 1;
			position: relative;
			
			// box-shadow: 1px 1px 0px $title_color;
			&::before{
				content: '';
				width: 100%;
				height: 100%;
				background-color:rgba(0,0,0,.5);
				position: absolute;
				top: 0px;
				transition:background-color .8s 0s ;
				// z-index: -1;
			}
			transition:flex-grow .8s 0s,opacity .8s 0s ;
			opacity: 1;
			img{
				// width: 80%;
				// @include m{
				// 	width: 100%;
				// }
				width: 100%;
				height: 100%;
				object-fit: cover;
				object-position: center;
			}
			h2{
				position:absolute;
				bottom: 20%;
				left: 0;
				right: 0;
				margin: auto;
				// display:none;
				font-weight: 700;
				font-size: 36px;
				color: $second_color;
				text-align: center;
				opacity:0 ;
			}
			
		}
		// .cover_pic:first-child{
		// 	flex-grow: 6;	
		// }
	
		.main{
			flex-grow: 6;
			opacity: 1;
			transition:flex-grow .8s 0s,opacity .8s 0s ;
			position: relative;
			cursor:auto;
			&::before{
				background-color:rgba(0,0,0,0);
				// z-index: -1;
				transition:background-color .8s 0s ;
			}
			.cover_btn{
				opacity: 1;
				transition:opacity .8s .8s ;
			}
			h2{
				opacity: 1;
				transition:opacity .8s .3s ;
			}
		}

	}

	.textLoop_animate {
		display: flex;
		flex-wrap: nowrap;
  		overflow: hidden;
	
	}
	.logo_texts{
		animation: textLoop 10s linear infinite;
		font-size: 48px;
		color: $second_color;
		font-weight: 900;
		font-style: italic;
		white-space: nowrap;  


	}
	@keyframes textLoop {
		0% {
			-webkit-transform: translate3d(0, 0, 0);
			transform: translate3d(0, 0, 0)
		}
		100% {
			-webkit-transform: translate3d(-100%, 0, 0);
			transform: translate3d(-100%, 0, 0)
		}
	}
	.mulstyle_list{
		display: flex;
		width: 100%;
		// max-width: 312px;
		margin:30px auto;
		height: 250px;
		margin-bottom:50px ;
		@include m{

			height: 350px;
		}
		@include l{

			height: 390px;
		}
		@include xl{
			max-width: 1200px;
			height: 400px;
		}
		.style_pic{
			overflow: hidden;
			img{
				width: 80%;
				@include m{
					width: 100%;
				}
				width: 100%;
				height: 100%;
				object-fit: cover;
				object-position: center;
			}
			

		}
	}
	.col{
		margin: 10px 0px;
		img{
			width: 100%;
			height: 100%;
			object-fit: cover;
		}
	}
	.container{
		margin-bottom: 10px;
		width: 80%;
		max-width: 312px;
		@include m{
			max-width: 768px;
		}
		@include xl{
			max-width: 960px;
		}
		.row{
			margin: 10px;
		}
	}


	a{
		text-decoration: none;
	}
	.outfit_title{
		margin-top:15px ;
		color: #000;
		h2{
			margin-bottom: 10px;
		}
		padding: 15px 0px;
		border: 1px solid #000;
		width: 80%;
		max-width:312px;
		@include m{
			max-width: 768px;
		}
		@include xl{
			max-width: 960px;
		}
		margin: auto;
		text-align: center;
		font-size: 20px;
		font-weight: 600;
		.outfit_item{
			position: relative;
			display: inline-block;
			font-size: 14px;
			font-weight: 400;
			padding: 5px 20px;
			cursor: pointer;
			a{
				color: #000;
			}
	}
	.outfit_item::after {
		content: '';
		position: absolute;
		width: 70px;
		transform: scaleX(0);
		height: 5px;
		bottom: 0;
		left: 17.5px;
		background-color: $main_color;
		transform-origin: bottom right;
		transition: transform 0.2s ease-out;
		
	  }
// 	  .active{
// 		position: absolute;
// 		width: 70px;
// 
// 		height: 5px;
// 
// 
// 		background-color: $main_color;
// 	  }
	  
	  .outfit_item.active::after {
		transform: scaleX(1);
		transform-origin: bottom left;
	  }
	}
	.kol_stylist{
		display: flex;
		flex-direction: column;
		width: 80%;
		max-width: 390px;
		margin: 30px auto;
		@include m{
			flex-direction: row;
			max-width: 1200px;
			max-height:690px ;
		}
		.kol_pic{
			position: relative;
			width: 100%;
			h3{
				position:absolute;
				font-weight: 900;
				font-size: 32px;
				bottom:60px;
				color: $second_color;
				left: 20px;
			}
			p{
				color: $second_color;
				position:absolute;
				font-size: 14px;
				left: 20px;
				bottom:30px;
			}
			img{
				width: 100%;
				height: 100%;

				object-fit: cover;
				object-position: top;
			}
		}
		@include m{
			// max-width: 768px;
		}
		@include l{
			// max-width: 1024px;
		}
		@include xl{
			max-width: 1200px;
		}
		.kol_look{
			display: flex;
			flex-wrap: wrap;
			width: 100%;
			max-height:690px ;
			.kol_look_pic{
				width: 50%;
				max-height: 345px;
				img{
				width: 100%;
				height: 100%;
				object-fit: cover;
				object-position: top;
			}
			}
			
		}
	
	}
	.stylist_title{
		h2{
			color: $title_color;
			font-size: 32px;
			font-weight: 700;
			text-align: center;
			// padding: 50px 0px 20px;
		}
		
			margin: 50px auto 20px;
			// margin-bottom:20px ;
			width: 100%;;
			max-width: 1200px;
    		// margin-top: 50px;
			
	}
	.stylistLook{
		margin-bottom: 80px;
	}
</style>
