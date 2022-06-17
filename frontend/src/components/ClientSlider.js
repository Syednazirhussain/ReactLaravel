import React, {useState, useEffect, useContext } from 'react'
// import clientData from '../data/clientData'

import useCursorHandlers from "../hooks/useCursorHandlers";

import { StateContext } from "../context/State";

function ClientSlider() {

    const { settings } = useContext(StateContext);
    const style_headings = { fontFamily: settings.headings_font_family, color: settings.headings_color, fontSize: settings.headings_size, fontWeight: settings.headings_weight, textAlign: settings.headings_desktop_align }
    
    const { clients } = useContext( StateContext );
    
    // eslint-disable-next-line
    // const [clientList, setclientList] = useState(StateContext)
    const [index, setIndex] = useState(0)
    const [hover, setHover] = useState(false);

    const cursorHandlers = useCursorHandlers();


    // console.log( "C-------", clients )
    // console.log( "CL-------", clientList )

    useEffect(() => {
        const lastIndex = clients.length - 1
        
        if (index < 0){
            setIndex(lastIndex)
        }
        if (index > lastIndex){
            setIndex(0)
        }

    }, [index, clients])

    useEffect(() => {
        let slider = setInterval( () => {
            if (hover===true){
                setIndex(index+1)
            }
        }, 500)
        return () => clearInterval(slider)
    }, [hover, index])

    
    return ( 
        <section className="section">
            <div className="section-center" onMouseMove={ () => setHover(true) } onMouseEnter={() => setHover(true)} onMouseLeave={() => setHover(false)}>
            { 
                clients.map( (c, cId) => {
                    let position = 'nextSlide'
                    
                    if (cId === index){
                        position = 'activeSlide'
                    }

                    if (cId === index - 1 || (index === 0 && cId === clients.length - 1) ){
                        position = 'lastSlide'
                    }
                    
                    return (
                        <article className={position} key={c.id}>
                            <h2 className="slide-header"
                                style={ style_headings }
                                {...cursorHandlers} >{c.title}</h2>
                        </article>
                    )
                })
            }
            </div>
        </section>
        
    )
}

export default ClientSlider
