from flask import Flask , render_template, Response
from camera import Video

app=Flask(__name__)

@app.route('/')
def index():
    return render_template('page.html')

def gen(camera):
    while True:
        frame=camera.get_frame()
        yield(b'--frame\r\n' 
        b'content-Type: image/jpeg\r\n\r\n' + frame + 
        b'\r\n\r\n')
@app.route('/video')
def video():
    return Response(gen(video()),
    mimetype='mutipart/x-mixed-replace; boundary=frame')
app.run(debug=True)