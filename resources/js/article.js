import Vue from 'vue'
import './axios'
import article from './components/article.vue'
var vue=new Vue({
    el:'#app',
    render:c=>c(article)
})
