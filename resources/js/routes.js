
import Companies from './components/Companies.vue';
import AddCompany from './components/AddCompany.vue';
import UpdateCompany from './components/UpdateCompany.vue';

export const routes=[{
    name:'home',
    path:'/',
    component:Companies
},
{
    name:'add',
    path:'/add',
    component: AddCompany
},
{
    name:'edit',
    path:'/edit/:id',
    component:UpdateCompany
}
];