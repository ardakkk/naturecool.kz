import Main             from './pages/Main.vue'
import Technology       from './pages/Technology.vue'
import Confidentiality  from './pages/Confidentiality.vue'
import QA               from './pages/QA.vue'
import Game             from './pages/Game.vue'
import Rules            from './pages/Rules.vue'
import Contacts         from './pages/Contacts.vue'
import Error            from './pages/Error.vue'

export const routes = [
    { path: '/contacts',        name: 'contacts',       component: Contacts},
    { path: '/qa',              name: 'qa',             component: QA},
    { path: '/confidentiality', name: 'confidentiality',component: Confidentiality},
    { path: '/rules',           name: 'rules',          component: Rules},
    { path: '/technology',      name: 'technology',     component: Technology},
    { path: '/contest',         name: 'game',           component: Game},
    { path: '/',                name: 'main',           component: Main},
    { path: '*',                name: 'error',          component: Error}
];
