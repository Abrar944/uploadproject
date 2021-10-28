import React from 'react'
import { useState } from 'react'
import './App.css';

export default function Textform(promps) {
    const handleupclick = ()=>{
        console.log("Upper case" + text);
     let next = text.toUpperCase();
        setText(next);
        

    }
    const handlechange = (event)=>{
        setText(event.target.value)
    }

    const [text, setText] = useState('Enter the Text');

    return (
        <div>
<h1>{promps.heading}</h1>
<div className="mb-3">
<textarea className="form-control" value={text} onChange={handlechange} id="mybox" rows="8"  ></textarea><br />
<button type="button" className="btn btn-primary" onClick={handleupclick}> Convert to Upper case</button>
</div>

        </div>
    )
}
