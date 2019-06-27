const Vue = require('vue');

const Dashboard = resolve => {
  require.ensure(['../../dashboard/_components/Dashboard'], () => {
    resolve(require('../../dashboard/_components/Dashboard'))
  });
};

const routes = [
  {
    path: '/view/employees/view/:id',
    props: true,
    name: 'view-employee',
    component:  viewEmployee
  },
  {
    path: '/view/soon',
    props: true,
    name: 'soon',
    component:  Soon
  },
  {
    path: '/view/redirect-me',
    redirect: '/dashbord',
  },
  // {
  //   path: '/view/*',
  //   redirect: '/view/Dashboard',
  // },
]

export default routes;

// clildren: [{
//   path: 'add',
//   props: true,
//   name: 'add-employee',
//   component:  AddEmployee,
// }]
