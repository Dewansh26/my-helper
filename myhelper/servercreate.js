const http=require('http')
console.log('http')
//console.log(h)
const server=h.createServer(function(req,res){
    res.write('welcome node js server')
    res.write('thank you node js')
    res.end()
}).listen(3000,()=>console.log('server is running local host:3000'))
