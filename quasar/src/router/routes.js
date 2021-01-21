
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    meta: { auth: true },
    children: [
      { path: '', component: () => import('pages/Index.vue') },
      {
        path: 'members',
        name: 'members',
        meta: { auth: true },
        component: () => import('pages/members')
      }
    ]
  },
  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/error',
    component: () => import('pages/ErrorCode.vue')
  },
  {
    path: '*',
    component: () => import('pages/Error404.vue')
  }
]

export default routes
