const Ziggy = {
    "url": "http:\/\/user-admin.test",
    "port": null,
    "defaults": {},
    "routes": {
        "ignition.healthCheck": {
            "uri": "_ignition\/health-check",
            "methods": ["GET", "HEAD"]
        },
        "ignition.executeSolution": {
            "uri": "_ignition\/execute-solution",
            "methods": ["POST"]
        },
        "ignition.updateConfig": {
            "uri": "_ignition\/update-config",
            "methods": ["POST"]
        },
        "users.index": {
            "uri": "\/",
            "methods": ["GET", "HEAD"]
        },
        "users.create": {
            "uri": "create",
            "methods": ["GET", "HEAD"]
        },
        "users.edit": {
            "uri": "edit",
            "methods": ["GET", "HEAD"]
        }
    }
};

if (typeof window !== 'undefined' && typeof window.Ziggy !== 'undefined') {
    Object.assign(Ziggy.routes, window.Ziggy.routes);
}

export {
    Ziggy
};
