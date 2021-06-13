import React, { memo, useCallback, useState } from "react";
import ReactDOM from "react-dom";
import { format } from "date-fns";
import pt from "date-fns/locale/pt-BR";
const DateTimeShow = memo(() => {
    return (
        <>
            <div>{format(new Date(), "'Hoje é ' eeee", { locale: pt })}</div>
            <div>{format(new Date(), "dd/MM/yyyy hh:mm:ss")}</div>
        </>
    );
});

function App() {
    const [disabled, setDisabled] = useState(false);
    const handleToogle = () => setDisabled((state) => !state);
    const handleSendEmail = useCallback(() => {
        handleToogle();
        window.axios
            .get("/send")
            .then((result) => {
                console.log(result);
            })
            .catch((error) => {
                console.error(error);
            })
            .then(() => {
                handleToogle();
                console.log("End send e-mail");
            });
    }, [disabled, setDisabled]);
    return (
        <div>
            <DateTimeShow />
            <div>
                <button onClick={handleSendEmail} disabled={disabled}>
                    Enviar Email
                </button>
            </div>
        </div>
    );
}

export default App;

if (document.getElementById("app")) {
    ReactDOM.render(<App />, document.getElementById("app"));
}
