import { usePage } from '@inertiajs/react';


export default function userList({ className = '' }) {
    const users = usePage().props.users;

    return (
        <section className={className}>
            <header>
                <h2 className="text-lg font-medium text-gray-900 dark:text-gray-100">Registered User List</h2>                
                <table style={{width:"600px", margin:"10px 20px 10px 5px"}}>
                    <thead>
                        <tr>
                            <td style={{borderBottom:"1px solid #000"}}>User Id.</td>
                            <td style={{borderBottom:"1px solid #000"}}>Name</td>
                            <td style={{borderBottom:"1px solid #000"}}>Email</td>
                        </tr>
                    </thead>
                    <tbody>
                    {
                        users.map((val,key)=><Member user={val}/>)
                    }
                    </tbody>
                </table>

                <p className="mt-1 text-sm text-gray-600 dark:text-gray-400">
                Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum 
                Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum Loren ipsum 
                </p>
            </header>           
        </section>
    );
}


export function Member(props) {
    return (
        <tr key={props.user.id}>
            <td>{props.user.id}</td>
            <td>{props.user.name}</td>
            <td>{props.user.email}</td>
        </tr>
    );
}
