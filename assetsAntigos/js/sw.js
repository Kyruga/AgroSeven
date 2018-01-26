// 'use strict';
// const applicationServerPublicKey = 'BKHt975k-6PM_3RN7dYQWHEVtMBPK3TJNqSCWOjxsYAS-I_1oobGdaVxsNKBbguowckwizE4NwGbyLkEWv5Sr1s';
//
// function urlB64ToUint8Array(base64String) {
// 	const padding = '='.repeat((4 - base64String.length % 4) % 4);
// 	const base64 = (base64String + padding).replace(/\-/g, '+').replace(/_/g, '/');
// 	const rawData = window.atob(base64);
// 	const outputArray = new Uint8Array(rawData.length);
// 	for (let i = 0; i < rawData.length; ++i) {
// 		outputArray[i] = rawData.charCodeAt(i);
// 	}
// 	return outputArray;
// }
//
// self.addEventListener('push', function(event) {
// 	var dados=`${event.data.text()}`;
// 	try{
// 		var jd=JSON.parse(dados);
// 		//console.log("[Service Worker] Push Received data: ",jd);
// 		const title = jd.title;
// 		const options = {
// 			body: jd.body,
// 			icon: jd.icon,
// 			badge: jd.badge
// 		};
// 		event.waitUntil(self.registration.showNotification(title, options));
// 	}catch(e){
// 		console.log("Erro ao decodificar push:",dados,e);
// 	}
// });
//
// self.addEventListener("notificationclick", function (e) {
// 	console.log(e.notification);
// 	e.notification.close();
// 	// Focus tab if open
// 	e.waitUntil(clients.matchAll({
// 		type: 'window'
// 	}).then(function (clientList) {
// 		for (var i = 0; i < clientList.length; ++i) {
// 			var client = clientList[i];
// 			if (client.url != '/pushsvr/' && 'focus' in client) {
// 				return client.focus();
// 			}
// 		}
// 		if (clients.openWindow) {
// 			return clients.openWindow('/notify');
// 		}
// 	}));
// });
//
// self.addEventListener('pushsubscriptionchange', function(event) {
// 	//console.log('[Service Worker]: \'pushsubscriptionchange\' event fired.');
// 	const applicationServerKey = urlB64ToUint8Array(applicationServerPublicKey);
// 	event.waitUntil(
// 		self.registration.pushManager.subscribe({
// 			userVisibleOnly: true,
// 			applicationServerKey: applicationServerKey
// 		})
// 		.then(function(newSubscription) {
// 			console.log('[Service Worker] New subscription: ', newSubscription);
// 		})
// 	);
// });