<template>
	<section class="quiz_idx">
		<h2>找尋你的個人風格</h2>
		<p>嗨~ 你了解自己嗎 ?<br>也許你不知道自己適合什麼，也許你正在尋找新的自我風格，<br>不論你現在處於什麼狀態，讓 RE:Outfit 一起陪你尋找屬於你的<strong>穿搭風格公式</strong>吧!</p>
		<div class="wrap">
			<StyleCard content="時尚風" link="./pic/fashion2-1.png"/>
			<StyleCard content="極簡風" link="./pic/minimalist2-1.png"/>
			<StyleCard content="運動風" link="./pic/sport2-1.png"/>
			<StyleCard content="文青風" link="./pic/hipster2-1.png"/>
			<p>首先，請讓我們更認識你<br>點擊下方開始測驗你的風格</p>
		</div>
		<router-link :to="{ name:'QuestionBox' }"><button class="btn_s">測驗去</button></router-link>
	</section>
</template>
<script>
import StyleCard from "@/components/StyleCard.vue";
import Button from "@/components/Button.vue";

export default {
	name: "Quiz",
	components: {
		StyleCard,
		Button,
	},
};
</script>
<style lang="scss" scoped>
.quiz_idx{
	box-sizing: border-box;
	max-width: 1200px;
	margin: 0 auto 50px;
	h2{
		font-size: 32px;
		color: $title_color;
		font-weight: 600;
		text-align: center;
		padding: 30px;
	}
	p{
		font-size: 14px;
		text-align: center;
		color: $text_color;
		strong{
			font-weight: 600;
			position: relative;
			&:after{
				content: "";
				background-color: $main_color;
				height: 5px;
				width: 100%;
				position: absolute;
				left: 0;
				bottom: 0;
				z-index: -1;
			}
		}
	}
	.wrap{
		display: flex;
		flex-wrap: wrap;
		justify-content: space-around;
		padding: 30px 5px 0 5px;
		margin: 0 auto;
		p{
			margin-bottom: 30px;
		}
		
	}
	button{
		margin: auto;
		display: block;
	}
}
// 平板以上
@media screen and (min-width:768px) {
	.quiz_idx{
		h2{
			font-size: 48px;
		}
		p{
			font-size: 18px;
			line-height: 27px;
		}
		.wrap{
			padding: 50px 0;
			.item{
				width: 20%;
			}
			.item:nth-child(1), .item:nth-child(4){
				top: 50px;
			}
			P{
				display: none;
			}
		}

	}
}

</style>
